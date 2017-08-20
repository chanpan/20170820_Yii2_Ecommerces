<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\persons\models\NationalitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Nationalities');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="nationality-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'nationality-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'nationality-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['nationality/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-nationality']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['nationality/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-nationality', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionNationalityIds'
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
    'id' => 'modal-nationality',
    'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#nationality-grid-pjax').on('click', '#modal-addbtn-nationality', function() {
    modalNationality($(this).attr('data-url'));
});

$('#nationality-grid-pjax').on('click', '#modal-delbtn-nationality', function() {
    selectionNationalityGrid($(this).attr('data-url'));
});

$('#nationality-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#nationality-grid').yiiGridView('getSelectedRows');
	disabledNationalityBtn(key.length);
    },100);
});

$('#nationality-grid-pjax').on('click', '.selectionNationalityIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledNationalityBtn(key.length);
});

$('#nationality-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalNationality('".Url::to(['nationality/update', 'id'=>''])."'+id);
});	

$('#nationality-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalNationality(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#nationality-grid-pjax'});
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

function disabledNationalityBtn(num) {
    if(num>0) {
	$('#modal-delbtn-nationality').attr('disabled', false);
    } else {
	$('#modal-delbtn-nationality').attr('disabled', true);
    }
}

function selectionNationalityGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionNationalityIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#nationality-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalNationality(url) {
    $('#modal-nationality .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-nationality').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>