<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\guides\models\LanguageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Guidelangs');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="guidelang-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'guidelang-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'guidelang-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['/guides/language/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-guidelang']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['/guides/language/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-guidelang', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionGuidelangIds'
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
    'id' => 'modal-guidelang',
    'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#guidelang-grid-pjax').on('click', '#modal-addbtn-guidelang', function() {
    modalGuidelang($(this).attr('data-url'));
});

$('#guidelang-grid-pjax').on('click', '#modal-delbtn-guidelang', function() {
    selectionGuidelangGrid($(this).attr('data-url'));
});

$('#guidelang-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#guidelang-grid').yiiGridView('getSelectedRows');
	disabledGuidelangBtn(key.length);
    },100);
});

$('#guidelang-grid-pjax').on('click', '.selectionGuidelangIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledGuidelangBtn(key.length);
});

$('#guidelang-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalGuidelang('".Url::to(['/guides/language/update', 'id'=>''])."'+id);
});	

$('#guidelang-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalGuidelang(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#guidelang-grid-pjax'});
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

function disabledGuidelangBtn(num) {
    if(num>0) {
	$('#modal-delbtn-guidelang').attr('disabled', false);
    } else {
	$('#modal-delbtn-guidelang').attr('disabled', true);
    }
}

function selectionGuidelangGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionGuidelangIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#guidelang-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalGuidelang(url) {
    $('#modal-guidelang .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-guidelang').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>