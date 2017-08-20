<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\cases\models\CaseTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Case Types');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="case-type-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?php  Pjax::begin(['id'=>'case-type-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'case-type-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['case-type/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-case-type']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['case-type/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-case-type', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionCaseTypeIds'
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
            'description:ntext',
            [
                    'attribute'=>'weight',
                    'contentOptions'=>['style'=>'width:100px;'],
            ],
            [
		'attribute'=>'active',
		'value'=>function ($data){ 
                    if($data['active']){
                        return 'Yes';
                    } else {
                        return 'No';
                    }
                },
                'filter'=>Html::activeDropDownList($searchModel, 'active', ['No', 'Yes'], ['class'=>'form-control', 'prompt'=>'All']),
		'headerOptions'=>['style'=>'text-align: center;'],
		'contentOptions'=>['style'=>'width:100px; text-align: center;'],
            ],
            [
                    'attribute'=>'updated_at',
                    'value'=>function ($data){return \appxq\sdii\utils\SDdate::mysql2phpThDateSmall($data['updated_at']);},
                    'headerOptions'=>['style'=>'text-align: center;'],
                    'contentOptions'=>['style'=>'width:100px;text-align: center;'],
                    'filter'=>'',
            ],
            // 'created_at',
            // 'updated_at',
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
    'id' => 'modal-case-type',
    //'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#case-type-grid-pjax').on('click', '#modal-addbtn-case-type', function() {
    modalCaseType($(this).attr('data-url'));
});

$('#case-type-grid-pjax').on('click', '#modal-delbtn-case-type', function() {
    selectionCaseTypeGrid($(this).attr('data-url'));
});

$('#case-type-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#case-type-grid').yiiGridView('getSelectedRows');
	disabledCaseTypeBtn(key.length);
    },100);
});

$('#case-type-grid-pjax').on('click', '.selectionCaseTypeIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledCaseTypeBtn(key.length);
});

$('#case-type-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalCaseType('".Url::to(['case-type/update', 'id'=>''])."'+id);
});	

$('#case-type-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalCaseType(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#case-type-grid-pjax'});
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

function disabledCaseTypeBtn(num) {
    if(num>0) {
	$('#modal-delbtn-case-type').attr('disabled', false);
    } else {
	$('#modal-delbtn-case-type').attr('disabled', true);
    }
}

function selectionCaseTypeGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionCaseTypeIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#case-type-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalCaseType(url) {
    $('#modal-case-type .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-case-type').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>