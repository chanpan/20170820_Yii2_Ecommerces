<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\persons\models\RaceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Races');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="race-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'race-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'race-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['race/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-race']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['race/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-race', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionRaceIds'
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
    'id' => 'modal-race',
    'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#race-grid-pjax').on('click', '#modal-addbtn-race', function() {
    modalRace($(this).attr('data-url'));
});

$('#race-grid-pjax').on('click', '#modal-delbtn-race', function() {
    selectionRaceGrid($(this).attr('data-url'));
});

$('#race-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#race-grid').yiiGridView('getSelectedRows');
	disabledRaceBtn(key.length);
    },100);
});

$('#race-grid-pjax').on('click', '.selectionRaceIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledRaceBtn(key.length);
});

$('#race-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalRace('".Url::to(['race/update', 'id'=>''])."'+id);
});	

$('#race-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalRace(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#race-grid-pjax'});
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

function disabledRaceBtn(num) {
    if(num>0) {
	$('#modal-delbtn-race').attr('disabled', false);
    } else {
	$('#modal-delbtn-race').attr('disabled', true);
    }
}

function selectionRaceGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionRaceIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#race-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalRace(url) {
    $('#modal-race .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-race').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>