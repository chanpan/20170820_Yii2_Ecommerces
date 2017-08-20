<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\persons\models\BloodTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Blood Types');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="blood-type-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'blood-type-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'blood-type-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['blood-type/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-blood-type']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['blood-type/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-blood-type', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionBloodTypeIds'
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
    'id' => 'modal-blood-type',
    'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#blood-type-grid-pjax').on('click', '#modal-addbtn-blood-type', function() {
    modalBloodType($(this).attr('data-url'));
});

$('#blood-type-grid-pjax').on('click', '#modal-delbtn-blood-type', function() {
    selectionBloodTypeGrid($(this).attr('data-url'));
});

$('#blood-type-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#blood-type-grid').yiiGridView('getSelectedRows');
	disabledBloodTypeBtn(key.length);
    },100);
});

$('#blood-type-grid-pjax').on('click', '.selectionBloodTypeIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledBloodTypeBtn(key.length);
});

$('#blood-type-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalBloodType('".Url::to(['blood-type/update', 'id'=>''])."'+id);
});	

$('#blood-type-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalBloodType(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#blood-type-grid-pjax'});
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

function disabledBloodTypeBtn(num) {
    if(num>0) {
	$('#modal-delbtn-blood-type').attr('disabled', false);
    } else {
	$('#modal-delbtn-blood-type').attr('disabled', true);
    }
}

function selectionBloodTypeGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionBloodTypeIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#blood-type-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalBloodType(url) {
    $('#modal-blood-type .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-blood-type').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>