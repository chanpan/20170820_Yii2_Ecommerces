<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\guides\models\TypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Guidetypes');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="guidetype-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'guidetype-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'guidetype-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['type/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-guidetype']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['type/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-guidetype', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionGuidetypeIds'
		],
		'headerOptions' => ['style'=>'text-align: center;'],
		'contentOptions' => ['style'=>'width:40px;text-align: center;'],
	    ],
	    [
		'class' => 'yii\grid\SerialColumn',
		'headerOptions' => ['style'=>'text-align: center;'],
		'contentOptions' => ['style'=>'width:60px;text-align: center;'],
	    ],

            'id',
            'name',

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
    'id' => 'modal-guidetype',
    'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#guidetype-grid-pjax').on('click', '#modal-addbtn-guidetype', function() {
    modalGuidetype($(this).attr('data-url'));
});

$('#guidetype-grid-pjax').on('click', '#modal-delbtn-guidetype', function() {
    selectionGuidetypeGrid($(this).attr('data-url'));
});

$('#guidetype-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#guidetype-grid').yiiGridView('getSelectedRows');
	disabledGuidetypeBtn(key.length);
    },100);
});

$('#guidetype-grid-pjax').on('click', '.selectionGuidetypeIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledGuidetypeBtn(key.length);
});

$('#guidetype-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalGuidetype('".Url::to(['type/update', 'id'=>''])."'+id);
});	

$('#guidetype-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalGuidetype(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#guidetype-grid-pjax'});
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

function disabledGuidetypeBtn(num) {
    if(num>0) {
	$('#modal-delbtn-guidetype').attr('disabled', false);
    } else {
	$('#modal-delbtn-guidetype').attr('disabled', true);
    }
}

function selectionGuidetypeGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionGuidetypeIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#guidetype-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalGuidetype(url) {
    $('#modal-guidetype .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-guidetype').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>