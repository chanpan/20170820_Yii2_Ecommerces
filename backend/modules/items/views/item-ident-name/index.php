<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\items\models\ItemIdentNameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'ชื่อของข้อมูลยืนยันสิ่งของ');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="item-ident-name-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'item-ident-name-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'item-ident-name-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['item-ident-name/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-item-ident-name']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['item-ident-name/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-item-ident-name', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionItemIdentNameIds'
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
            'term_taxonomy_id',
            'identification1_name',
            'identification2_name',
            'identification3_name',
             'identification4_name',
             'identification5_name',

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
    'id' => 'modal-item-ident-name',
    //'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#item-ident-name-grid-pjax').on('click', '#modal-addbtn-item-ident-name', function() {
    modalItemIdentName($(this).attr('data-url'));
});

$('#item-ident-name-grid-pjax').on('click', '#modal-delbtn-item-ident-name', function() {
    selectionItemIdentNameGrid($(this).attr('data-url'));
});

$('#item-ident-name-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#item-ident-name-grid').yiiGridView('getSelectedRows');
	disabledItemIdentNameBtn(key.length);
    },100);
});

$('#item-ident-name-grid-pjax').on('click', '.selectionItemIdentNameIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledItemIdentNameBtn(key.length);
});

$('#item-ident-name-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalItemIdentName('".Url::to(['item-ident-name/update', 'id'=>''])."'+id);
});	

$('#item-ident-name-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalItemIdentName(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#item-ident-name-grid-pjax'});
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

function disabledItemIdentNameBtn(num) {
    if(num>0) {
	$('#modal-delbtn-item-ident-name').attr('disabled', false);
    } else {
	$('#modal-delbtn-item-ident-name').attr('disabled', true);
    }
}

function selectionItemIdentNameGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionItemIdentNameIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#item-ident-name-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalItemIdentName(url) {
    $('#modal-item-ident-name .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-item-ident-name').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>