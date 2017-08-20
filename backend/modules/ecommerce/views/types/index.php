<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\ecommerce\models\TypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'ประเภทสินค้า');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="types-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'types-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'types-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['types/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-types']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['types/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-types', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionTypeIds'
		],
		'headerOptions' => ['style'=>'text-align: center;'],
		'contentOptions' => ['style'=>'width:40px;text-align: center;'],
	    ],
	    [
		'class' => 'yii\grid\SerialColumn',
		'headerOptions' => ['style'=>'text-align: center;'],
		'contentOptions' => ['style'=>'width:60px;text-align: center;'],
	    ],

            //'id',
            'name',
            [
                'format'=>'raw',
                'attribute'=>'group_id',
                'value'=>function($model){
                    return $model->groups->name;
                },
                'filter'=> \yii\helpers\ArrayHelper::map(\backend\modules\ecommerce\models\EGroup::find()->asArray()->all(), 'id', 'name'),
            ],

	    [
		'class' => 'appxq\sdii\widgets\ActionColumn',
		'contentOptions' => ['style'=>'width:80px;text-align: center;'],
		'template' => '{update} {delete}',
	    ],
        ],
    ]); ?>
    <?php  Pjax::end();?>

</div>

<?=  ModalForm::widget([
    'id' => 'modal-types',
    'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#types-grid-pjax').on('click', '#modal-addbtn-types', function() {
    modalType($(this).attr('data-url'));
});

$('#types-grid-pjax').on('click', '#modal-delbtn-types', function() {
    selectionTypeGrid($(this).attr('data-url'));
});

$('#types-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#types-grid').yiiGridView('getSelectedRows');
	disabledTypeBtn(key.length);
    },100);
});

$('#types-grid-pjax').on('click', '.selectionTypeIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledTypeBtn(key.length);
});

$('#types-grid-pjax').on('click', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalType('".Url::to(['types/update', 'id'=>''])."'+id);
});	

$('#types-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalType(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#types-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }).fail(function() {
		". SDNoty::show("'" . SDHtml::getMsgError() . "Server Error'", '"error"') ."
		console.log('server error');
	    });
	});
    }
    return false;
});

function disabledTypeBtn(num) {
    if(num>0) {
	$('#modal-delbtn-types').attr('disabled', false);
    } else {
	$('#modal-delbtn-types').attr('disabled', true);
    }
}

function selectionTypeGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionTypeIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#types-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalType(url) {
    $('#modal-types .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-types').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>