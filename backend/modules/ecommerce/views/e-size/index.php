<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\ecommerce\models\ESizeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Esizes');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="esizes-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'esizes-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'esizes-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['e-size/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-esizes']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['e-size/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-esizes', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionESizeIds'
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
    'id' => 'modal-esizes',
    'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#esizes-grid-pjax').on('click', '#modal-addbtn-esizes', function() {
    modalESize($(this).attr('data-url'));
});

$('#esizes-grid-pjax').on('click', '#modal-delbtn-esizes', function() {
    selectionESizeGrid($(this).attr('data-url'));
});

$('#esizes-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#esizes-grid').yiiGridView('getSelectedRows');
	disabledESizeBtn(key.length);
    },100);
});

$('#esizes-grid-pjax').on('click', '.selectionESizeIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledESizeBtn(key.length);
});

$('#esizes-grid-pjax').on('click', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalESize('".Url::to(['e-size/update', 'id'=>''])."'+id);
});	

$('#esizes-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalESize(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#esizes-grid-pjax'});
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

function disabledESizeBtn(num) {
    if(num>0) {
	$('#modal-delbtn-esizes').attr('disabled', false);
    } else {
	$('#modal-delbtn-esizes').attr('disabled', true);
    }
}

function selectionESizeGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionESizeIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#esizes-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalESize(url) {
    $('#modal-esizes .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-esizes').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>