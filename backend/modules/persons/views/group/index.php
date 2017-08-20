<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\persons\models\GroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Groups');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="group-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'group-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'group-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['group/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-group']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['group/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-group', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionGroupIds'
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
            'description',
            'parent_group_id',
            'active',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',

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
    'id' => 'modal-group',
    'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#group-grid-pjax').on('click', '#modal-addbtn-group', function() {
    modalGroup($(this).attr('data-url'));
});

$('#group-grid-pjax').on('click', '#modal-delbtn-group', function() {
    selectionGroupGrid($(this).attr('data-url'));
});

$('#group-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#group-grid').yiiGridView('getSelectedRows');
	disabledGroupBtn(key.length);
    },100);
});

$('#group-grid-pjax').on('click', '.selectionGroupIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledGroupBtn(key.length);
});

$('#group-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalGroup('".Url::to(['group/update', 'id'=>''])."'+id);
});	

$('#group-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalGroup(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#group-grid-pjax'});
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

function disabledGroupBtn(num) {
    if(num>0) {
	$('#modal-delbtn-group').attr('disabled', false);
    } else {
	$('#modal-delbtn-group').attr('disabled', true);
    }
}

function selectionGroupGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionGroupIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#group-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalGroup(url) {
    $('#modal-group .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-group').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>