<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\persons\models\SubdistrictSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Subdistricts');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="subdistrict-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'subdistrict-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'subdistrict-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['subdistrict/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-subdistrict']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['subdistrict/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-subdistrict', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionSubdistrictIds'
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
            'districtId',

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
    'id' => 'modal-subdistrict',
    'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#subdistrict-grid-pjax').on('click', '#modal-addbtn-subdistrict', function() {
    modalSubdistrict($(this).attr('data-url'));
});

$('#subdistrict-grid-pjax').on('click', '#modal-delbtn-subdistrict', function() {
    selectionSubdistrictGrid($(this).attr('data-url'));
});

$('#subdistrict-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#subdistrict-grid').yiiGridView('getSelectedRows');
	disabledSubdistrictBtn(key.length);
    },100);
});

$('#subdistrict-grid-pjax').on('click', '.selectionSubdistrictIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledSubdistrictBtn(key.length);
});

$('#subdistrict-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalSubdistrict('".Url::to(['subdistrict/update', 'id'=>''])."'+id);
});	

$('#subdistrict-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalSubdistrict(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#subdistrict-grid-pjax'});
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

function disabledSubdistrictBtn(num) {
    if(num>0) {
	$('#modal-delbtn-subdistrict').attr('disabled', false);
    } else {
	$('#modal-delbtn-subdistrict').attr('disabled', true);
    }
}

function selectionSubdistrictGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionSubdistrictIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#subdistrict-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalSubdistrict(url) {
    $('#modal-subdistrict .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-subdistrict').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>