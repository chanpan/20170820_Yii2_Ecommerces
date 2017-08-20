<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\cases\models\NotifySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'ทะเบียนรับแจ้งเหตุ');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="notify-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'notify-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'notify-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['notify/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-notify']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['notify/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-notify', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
    'columns' => [
	    [
            'class' => 'yii\grid\CheckboxColumn',
            'checkboxOptions' => [
                'class' => 'selectionNotifyIds'
            ],
            'headerOptions' => ['style'=>'text-align: center;'],
            'contentOptions' => ['style'=>'width:40px;text-align: center;'],
	    ],
	    [
		    'class' => 'yii\grid\SerialColumn',
		    'headerOptions' => ['style'=>'text-align: center;'],
		    'contentOptions' => ['style'=>'width:60px;text-align: center;'],
	    ],
            // 'notify_choice',
            'notify_no',
            'name',
            [
                'attribute' => 'case_type_id',
                'filter' => \backend\modules\cases\models\CaseType::find()->indexBy('id')->select('name')->column(),
                'value'=> 'caseTypeName'
            ],
            // 'location',
            [
                    'attribute'=>'notify_date',
                    'value'=>function ($data){return \appxq\sdii\utils\SDdate::mysql2phpThDateTime($data['notify_date']);},
                    'headerOptions'=>['style'=>'text-align: center;'],
                    'contentOptions'=>['style'=>'width:150px;text-align: center;']
            ],
            // 'notify_from',
            // 'notify_from_type',
            // 'case_type_id',
            // 'case_type_other',
            // 'location_text:ntext',
            // 'sdate',
            // 'stime',
            // 'edate',
            // 'etime',
            // 'time_total',
            // 'desc:ntext',
            // 'emp_name',
            // 'emp_tel',
            // 'sufferer_name',
            // 'sufferer_tel',
            // 'status',
            // 'content:ntext',
            // 'created_by',
            // 'created_at',
            // 'updated_by',
            // 'updated_at',
            // [
            //     'attribute'=>'status',
            //     'value'=> function ($data){ 
            //                 if($data['status']){
            //                     return 'Yes';
            //                 } else {
            //                     return 'No';
            //                 }
            //             },
            //             'filter'=>Html::activeDropDownList($searchModel, 'status', ['No', 'Yes'], ['class'=>'form-control', 'prompt'=>'All']),
            //     'headerOptions'=>['style'=>'text-align: center;'],
            //     'contentOptions'=>['style'=>'width:100px; text-align: center;'],
            // ],
            [
            'header' => 'Case',
            'value' => function ($model) {
                return Html::button('<i class="fa fa-users"></i> ', [
                    'class' => 'case-btn btn btn-block btn-sm btn-primary',
                    'data-id' => $model->id,
                    'data-url' => yii\helpers\Url::to(['/cases/cases/save', 'notify_id' => $model->id]),
                ]);
            },
            'format' => 'raw',
            'headerOptions'=>['style'=>'text-align: center;'],
            'contentOptions'=>['style'=>'width:90px;text-align: center;'],
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
    'id' => 'modal-notify',
    'size'=>'modal-xxl',
]);
?>

<?=  ModalForm::widget([
    'id' => 'modal-cases',
    'size'=>'modal-xxl',
    'tabindexEnable'=>false,
]);
?>

<?=  ModalForm::widget([
    'id' => 'modal-items',
    'size'=>'modal-xxl',
    'tabindexEnable'=>false,
]);
?>

<?php  \vova07\imperavi\Asset::register($this);?>
<?php  \appxq\sdii\assets\drawing\DrawingAsset::register($this);?>

<?php  $this->registerJs("
$('#notify-grid-pjax').on('click', '.case-btn', function() {
    modalCase($(this).attr('data-url'));
});

$('#notify-grid-pjax').on('click', '#modal-addbtn-notify', function() {
    modalNotify($(this).attr('data-url'));
});

$('#notify-grid-pjax').on('click', '#modal-delbtn-notify', function() {
    selectionNotifyGrid($(this).attr('data-url'));
});

$('#notify-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#notify-grid').yiiGridView('getSelectedRows');
	disabledNotifyBtn(key.length);
    },100);
});

$('#notify-grid-pjax').on('click', '.selectionNotifyIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledNotifyBtn(key.length);
});

$('#notify-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalNotify('".Url::to(['notify/update', 'id'=>''])."'+id);
});	

$('#notify-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalNotify(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#notify-grid-pjax'});
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

function disabledNotifyBtn(num) {
    if(num>0) {
	$('#modal-delbtn-notify').attr('disabled', false);
    } else {
	$('#modal-delbtn-notify').attr('disabled', true);
    }
}

function selectionNotifyGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionNotifyIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#notify-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalNotify(url) {
    $('#modal-notify .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-notify').modal('show')
    .find('.modal-content')
    .load(url);
}

function modalCase(url) {
    $('#modal-cases .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-cases').modal('show')
    .find('.modal-content')
    .load(url);
}
");?>