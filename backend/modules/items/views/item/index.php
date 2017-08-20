<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\items\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Items');
$this->params['breadcrumbs'][] = $this->title;
$dataGroup = backend\modules\core\classes\CoreFunc::getTaxonomyDropDownList(0, 'item_group');
?>
<div class="item-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'item-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'item-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['item/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-item']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['item/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-item', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionItemIds'
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
            [
		'attribute'=>'item_group_id',
                'value'=>function ($data){ 
                    $data_taxonomy = \backend\modules\core\classes\CoreQuery::getTaxonomyById($data->item_group_id);
                    if($data_taxonomy){
                        return $data_taxonomy['name'];
                    }
                    return '';
                },
		'label'=>'กลุ่ม',
                        'contentOptions'=>['style'=>'width:180px;'],     
                'filter'=>Html::activeDropDownList($searchModel, 'item_group_id', $dataGroup, ['encode' => false, 'class'=>'form-control', 'prompt'=>'All']),        
            ],
            'name',
            //'description',
            'identification1',
             'identification2',
             'identification3',
            // 'identification4',
            // 'identification5',
            // 'active',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',
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
    'id' => 'modal-item',
    'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#item-grid-pjax').on('click', '#modal-addbtn-item', function() {
    modalItem($(this).attr('data-url'));
});

$('#item-grid-pjax').on('click', '#modal-delbtn-item', function() {
    selectionItemGrid($(this).attr('data-url'));
});

$('#item-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#item-grid').yiiGridView('getSelectedRows');
	disabledItemBtn(key.length);
    },100);
});

$('#item-grid-pjax').on('click', '.selectionItemIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledItemBtn(key.length);
});

$('#item-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalItem('".Url::to(['item/update', 'id'=>''])."'+id);
});	

$('#item-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalItem(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#item-grid-pjax'});
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

function disabledItemBtn(num) {
    if(num>0) {
	$('#modal-delbtn-item').attr('disabled', false);
    } else {
	$('#modal-delbtn-item').attr('disabled', true);
    }
}

function selectionItemGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionItemIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#item-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalItem(url) {
    $('#modal-item .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-item').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>