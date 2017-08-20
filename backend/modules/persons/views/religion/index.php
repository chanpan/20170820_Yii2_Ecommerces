<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\persons\models\ReligionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Religions');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="religion-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'religion-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'religion-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['religion/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-religion']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['religion/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-religion', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionReligionIds'
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
    'id' => 'modal-religion',
    'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#religion-grid-pjax').on('click', '#modal-addbtn-religion', function() {
    modalReligion($(this).attr('data-url'));
});

$('#religion-grid-pjax').on('click', '#modal-delbtn-religion', function() {
    selectionReligionGrid($(this).attr('data-url'));
});

$('#religion-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#religion-grid').yiiGridView('getSelectedRows');
	disabledReligionBtn(key.length);
    },100);
});

$('#religion-grid-pjax').on('click', '.selectionReligionIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledReligionBtn(key.length);
});

$('#religion-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalReligion('".Url::to(['religion/update', 'id'=>''])."'+id);
});	

$('#religion-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalReligion(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#religion-grid-pjax'});
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

function disabledReligionBtn(num) {
    if(num>0) {
	$('#modal-delbtn-religion').attr('disabled', false);
    } else {
	$('#modal-delbtn-religion').attr('disabled', true);
    }
}

function selectionReligionGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionReligionIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#religion-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalReligion(url) {
    $('#modal-religion .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-religion').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>