<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\ecommerce\models\PromotionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Promotions');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="promotion-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'promotion-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'promotion-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['promotion/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-promotion']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['promotion/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-promotion', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionPromotionIds'
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
            'detail:ntext',
            'discount',
            'date_start',
            // 'date_end',

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
    'id' => 'modal-promotion',
    'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#promotion-grid-pjax').on('click', '#modal-addbtn-promotion', function() {
    modalPromotion($(this).attr('data-url'));
});

$('#promotion-grid-pjax').on('click', '#modal-delbtn-promotion', function() {
    selectionPromotionGrid($(this).attr('data-url'));
});

$('#promotion-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#promotion-grid').yiiGridView('getSelectedRows');
	disabledPromotionBtn(key.length);
    },100);
});

$('#promotion-grid-pjax').on('click', '.selectionPromotionIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledPromotionBtn(key.length);
});

$('#promotion-grid-pjax').on('click', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalPromotion('".Url::to(['promotion/update', 'id'=>''])."'+id);
});	

$('#promotion-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalPromotion(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#promotion-grid-pjax'});
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

function disabledPromotionBtn(num) {
    if(num>0) {
	$('#modal-delbtn-promotion').attr('disabled', false);
    } else {
	$('#modal-delbtn-promotion').attr('disabled', true);
    }
}

function selectionPromotionGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionPromotionIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#promotion-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalPromotion(url) {
    $('#modal-promotion .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-promotion').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>