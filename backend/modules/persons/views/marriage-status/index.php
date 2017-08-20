<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\persons\models\MarriageStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Marriage Statuses');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="marriage-status-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'marriage-status-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'marriage-status-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['marriage-status/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-marriage-status']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['marriage-status/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-marriage-status', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionMarriageStatusIds'
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
            'weight',
            'active',

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
    'id' => 'modal-marriage-status',
    'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#marriage-status-grid-pjax').on('click', '#modal-addbtn-marriage-status', function() {
    modalMarriageStatus($(this).attr('data-url'));
});

$('#marriage-status-grid-pjax').on('click', '#modal-delbtn-marriage-status', function() {
    selectionMarriageStatusGrid($(this).attr('data-url'));
});

$('#marriage-status-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#marriage-status-grid').yiiGridView('getSelectedRows');
	disabledMarriageStatusBtn(key.length);
    },100);
});

$('#marriage-status-grid-pjax').on('click', '.selectionMarriageStatusIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledMarriageStatusBtn(key.length);
});

$('#marriage-status-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalMarriageStatus('".Url::to(['marriage-status/update', 'id'=>''])."'+id);
});	

$('#marriage-status-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalMarriageStatus(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#marriage-status-grid-pjax'});
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

function disabledMarriageStatusBtn(num) {
    if(num>0) {
	$('#modal-delbtn-marriage-status').attr('disabled', false);
    } else {
	$('#modal-delbtn-marriage-status').attr('disabled', true);
    }
}

function selectionMarriageStatusGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionMarriageStatusIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#marriage-status-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalMarriageStatus(url) {
    $('#modal-marriage-status .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-marriage-status').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>