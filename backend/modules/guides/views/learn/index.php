<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\guides\models\LearnSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Guides');
$this->params['breadcrumbs'][] = $this->title;

 

?>
<div class="guides-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'guides-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'guides-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['/guides/learn/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-guides']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['/guides/learn/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-guides', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionGuideIds'
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
            'install:ntext',
             
            [
                'attribute'=>'lang',
                'value'=>function($model){
                    return $model->langs->name;
                }
            ],
            [
                'attribute' => 'types',
                'value' => function($model) {
                    return $model->type->name;
                }
            ],
        

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
    'id' => 'modal-guides',
    'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#guides-grid-pjax').on('click', '#modal-addbtn-guides', function() {
    modalGuide($(this).attr('data-url'));
});

$('#guides-grid-pjax').on('click', '#modal-delbtn-guides', function() {
    selectionGuideGrid($(this).attr('data-url'));
});

$('#guides-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#guides-grid').yiiGridView('getSelectedRows');
	disabledGuideBtn(key.length);
    },100);
});

$('#guides-grid-pjax').on('click', '.selectionGuideIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledGuideBtn(key.length);
});

$('#guides-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalGuide('".Url::to(['/guides/learn/update', 'id'=>''])."'+id);
});	

$('#guides-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalGuide(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#guides-grid-pjax'});
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

function disabledGuideBtn(num) {
    if(num>0) {
	$('#modal-delbtn-guides').attr('disabled', false);
    } else {
	$('#modal-delbtn-guides').attr('disabled', true);
    }
}

function selectionGuideGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionGuideIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#guides-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalGuide(url) {
    $('#modal-guides .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-guides').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>