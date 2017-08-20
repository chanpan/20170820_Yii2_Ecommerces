<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\ecommerce\models\EGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'หมวดหมู่สินค้า');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="egroup-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'egroup-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'egroup-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['e-group/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-egroup']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['e-group/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-egroup', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionEGroupIds'
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
		'class' => 'appxq\sdii\widgets\ActionColumn',
		'contentOptions' => ['style'=>'width:80px;text-align: center;'],
		'template' => '{update} {delete}',
	    ],
        ],
    ]); ?>
    <?php  Pjax::end();?>

</div>

<?=  ModalForm::widget([
    'id' => 'modal-egroup',
    'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#egroup-grid-pjax').on('click', '#modal-addbtn-egroup', function() {
    modalEGroup($(this).attr('data-url'));
});

$('#egroup-grid-pjax').on('click', '#modal-delbtn-egroup', function() {
    selectionEGroupGrid($(this).attr('data-url'));
});

$('#egroup-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#egroup-grid').yiiGridView('getSelectedRows');
	disabledEGroupBtn(key.length);
    },100);
});

$('#egroup-grid-pjax').on('click', '.selectionEGroupIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledEGroupBtn(key.length);
});

$('#egroup-grid-pjax').on('click', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalEGroup('".Url::to(['e-group/update', 'id'=>''])."'+id);
});	

$('#egroup-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalEGroup(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#egroup-grid-pjax'});
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

function disabledEGroupBtn(num) {
    if(num>0) {
	$('#modal-delbtn-egroup').attr('disabled', false);
    } else {
	$('#modal-delbtn-egroup').attr('disabled', true);
    }
}

function selectionEGroupGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionEGroupIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#egroup-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalEGroup(url) {
    $('#modal-egroup .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-egroup').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>