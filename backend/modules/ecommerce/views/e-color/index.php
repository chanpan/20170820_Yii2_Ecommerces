<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\ecommerce\models\EColorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Colors');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="ecolors-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'ecolors-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'ecolors-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['e-color/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-ecolors']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['e-color/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-ecolors', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionEColorIds'
		],
		'headerOptions' => ['style'=>'text-align: center;'],
		'contentOptions' => ['style'=>'width:40px;text-align: center;'],
	    ],
	    [
		'class' => 'yii\grid\SerialColumn',
		'headerOptions' => ['style'=>'text-align: center;'],
		'contentOptions' => ['style'=>'width:60px;text-align: center;'],
	    ],

           // 'id',
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
    'id' => 'modal-ecolors',
    'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#ecolors-grid-pjax').on('click', '#modal-addbtn-ecolors', function() {
    modalEColor($(this).attr('data-url'));
});

$('#ecolors-grid-pjax').on('click', '#modal-delbtn-ecolors', function() {
    selectionEColorGrid($(this).attr('data-url'));
});

$('#ecolors-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#ecolors-grid').yiiGridView('getSelectedRows');
	disabledEColorBtn(key.length);
    },100);
});

$('#ecolors-grid-pjax').on('click', '.selectionEColorIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledEColorBtn(key.length);
});

$('#ecolors-grid-pjax').on('click', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalEColor('".Url::to(['e-color/update', 'id'=>''])."'+id);
});	

$('#ecolors-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalEColor(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#ecolors-grid-pjax'});
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

function disabledEColorBtn(num) {
    if(num>0) {
	$('#modal-delbtn-ecolors').attr('disabled', false);
    } else {
	$('#modal-delbtn-ecolors').attr('disabled', true);
    }
}

function selectionEColorGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionEColorIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#ecolors-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalEColor(url) {
    $('#modal-ecolors .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-ecolors').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>