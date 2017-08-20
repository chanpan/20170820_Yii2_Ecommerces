<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\cases\models\CaseItemsTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Case Items Types'). '#'. ucfirst($group);
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="case-items-type-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <?php  Pjax::begin(['id'=>'case-items-type-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'case-items-type-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['case-items-type/create', 'group'=>$group]), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-case-items-type']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['case-items-type/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-case-items-type', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionCaseItemsTypeIds'
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
            //'group',
            'name',
            
            [
                    'attribute'=>'updated_at',
                    'value'=>function ($data){return \appxq\sdii\utils\SDdate::mysql2phpThDateSmall($data['updated_at']);},
                    'headerOptions'=>['style'=>'text-align: center;'],
                    'contentOptions'=>['style'=>'width:100px;text-align: center;'],
                    'filter'=>'',
            ],
            // 'created_by',
            // 'updated_by',

	    [
		'class' => 'appxq\sdii\widgets\ActionColumn',
		'contentOptions' => ['style'=>'width:80px;text-align: center;'],
		'template' => '{view} {update} {delete}',
	    ],
        ],
    ]); ?>
    <?php  Pjax::end();?>

</div>

<?=  ModalForm::widget([
    'id' => 'modal-case-items-type',
    //'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#case-items-type-grid-pjax').on('click', '#modal-addbtn-case-items-type', function() {
    modalCaseItemsType($(this).attr('data-url'));
});

$('#case-items-type-grid-pjax').on('click', '#modal-delbtn-case-items-type', function() {
    selectionCaseItemsTypeGrid($(this).attr('data-url'));
});

$('#case-items-type-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#case-items-type-grid').yiiGridView('getSelectedRows');
	disabledCaseItemsTypeBtn(key.length);
    },100);
});

$('#case-items-type-grid-pjax').on('click', '.selectionCaseItemsTypeIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledCaseItemsTypeBtn(key.length);
});

$('#case-items-type-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalCaseItemsType('".Url::to(['case-items-type/update', 'id'=>''])."'+id);
});	

$('#case-items-type-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalCaseItemsType(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#case-items-type-grid-pjax'});
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

function disabledCaseItemsTypeBtn(num) {
    if(num>0) {
	$('#modal-delbtn-case-items-type').attr('disabled', false);
    } else {
	$('#modal-delbtn-case-items-type').attr('disabled', true);
    }
}

function selectionCaseItemsTypeGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionCaseItemsTypeIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#case-items-type-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalCaseItemsType(url) {
    $('#modal-case-items-type .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-case-items-type').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>