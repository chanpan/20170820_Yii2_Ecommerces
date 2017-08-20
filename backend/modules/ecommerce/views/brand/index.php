<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\ecommerce\models\BrandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'แบรนด์สินค้า');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="brand-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'brand-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'brand-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['brand/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-brand']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['brand/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-brand', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionBrandIds'
		],
		'headerOptions' => ['style'=>'text-align: center;'],
		'contentOptions' => ['style'=>'width:40px;text-align: center;'],
	    ],
	    [
		'class' => 'yii\grid\SerialColumn',
		'headerOptions' => ['style'=>'text-align: center;'],
		'contentOptions' => ['style'=>'width:60px;text-align: center;'],
	    ],

           
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
    'id' => 'modal-brand',
    'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#brand-grid-pjax').on('click', '#modal-addbtn-brand', function() {
    modalBrand($(this).attr('data-url'));
});

$('#brand-grid-pjax').on('click', '#modal-delbtn-brand', function() {
    selectionBrandGrid($(this).attr('data-url'));
});

$('#brand-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#brand-grid').yiiGridView('getSelectedRows');
	disabledBrandBtn(key.length);
    },100);
});

$('#brand-grid-pjax').on('click', '.selectionBrandIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledBrandBtn(key.length);
});

$('#brand-grid-pjax').on('click', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalBrand('".Url::to(['brand/update', 'id'=>''])."'+id);
});	

$('#brand-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalBrand(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#brand-grid-pjax'});
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

function disabledBrandBtn(num) {
    if(num>0) {
	$('#modal-delbtn-brand').attr('disabled', false);
    } else {
	$('#modal-delbtn-brand').attr('disabled', true);
    }
}

function selectionBrandGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionBrandIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#brand-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalBrand(url) {
    $('#modal-brand .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-brand').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>