<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\cases\models\CasesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cases');
$this->params['breadcrumbs'][] = $this->title;

$op['language'] = 'th';
	
$q = array_filter($op);

$this->registerJsFile('https://maps.google.com/maps/api/js?key=AIzaSyCq1YL-LUao2xYx3joLEoKfEkLXsEVkeuk&'.http_build_query($q), [
    'position'=>\yii\web\View::POS_HEAD,
    'depends'=>'yii\web\YiiAsset',
]);

$dataCase = \yii\helpers\ArrayHelper::map(\backend\modules\cases\classes\CaseQuery::getCaseType(), 'id', 'name');
?>
<div class="cases-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'cases-grid-pjax', 'timeout' => 1000*60*2]);?>
    <?= GridView::widget([
	'id' => 'cases-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['cases/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-cases']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['cases/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-cases', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionCaseIds'
		],
		'headerOptions' => ['style'=>'text-align: center;'],
		'contentOptions' => ['style'=>'width:40px;text-align: center;'],
	    ],
	    [
		'class' => 'yii\grid\SerialColumn',
		'headerOptions' => ['style'=>'text-align: center;'],
		'contentOptions' => ['style'=>'width:60px;text-align: center;'],
	    ],

            //'id',
            //'report_of',
            [
		'attribute'=>'case_type_id',
                'value'=>function ($data){ 
                    return $data->caseType->name;
                },
		'label'=>'ประเภท',
                'filter'=>Html::activeDropDownList($searchModel, 'case_type_id', $dataCase, ['class'=>'form-control', 'prompt'=>'All']),        
            ],
            'name',
            //'description:ntext',
            // 'occurred_at',
            [
		'header' => 'Item',
		'value' => function ($model) {
		    return Html::button('<i class="fa fa-puzzle-piece"></i> '.(isset($model->item_count)?number_format($model->item_count):0), [
                        'class' => 'item-btn btn btn-xs btn-success',
                        'data-id' => $model->id,
                        'data-url' => yii\helpers\Url::to(['/items/item/save', 'case' => $model->id])
                    ]);
		},
		'format' => 'raw',
		'headerOptions'=>['style'=>'text-align: center;'],
		'contentOptions'=>['style'=>'width:90px;text-align: center;'],
	    ],
            [
		'header' => 'Place',
		'value' => function ($model) {
		    return Html::button('<i class="fa fa-map"></i> '.(isset($model->place_count)?number_format($model->place_count):0), [
                        'class' => 'place-btn btn btn-xs btn-info',
                        'data-id' => $model->id,
                        'data-url' => yii\helpers\Url::to(['/places/place/save', 'case' => $model->id])
                    ]);
		},
		'format' => 'raw',
		'headerOptions'=>['style'=>'text-align: center;'],
		'contentOptions'=>['style'=>'width:90px;text-align: center;'],
	    ], 
            [
		'header' => 'Person',
		'value' => function ($model) {
		    return Html::button('<i class="fa fa-users"></i> '.(isset($model->person_count)?number_format($model->person_count):0), [
                        'class' => 'person-btn btn btn-xs btn-warning',
                        'data-id' => $model->id,
                        'data-url' => yii\helpers\Url::to(['/persons/person/save', 'case' => $model->id])
                    ]);
		},
		'format' => 'raw',
		'headerOptions'=>['style'=>'text-align: center;'],
		'contentOptions'=>['style'=>'width:90px;text-align: center;'],
	    ],             
            [
		'attribute'=>'active',
		'value'=>function ($data){ 
                    if($data['active']){
                        return 'Yes';
                    } else {
                        return 'No';
                    }
                },
                'filter'=>Html::activeDropDownList($searchModel, 'active', ['No', 'Yes'], ['class'=>'form-control', 'prompt'=>'All']),
		'headerOptions'=>['style'=>'text-align: center;'],
		'contentOptions'=>['style'=>'width:100px; text-align: center;'],
            ],
            [
                    'attribute'=>'occurred_at',
                    'value'=>function ($data){return \appxq\sdii\utils\SDdate::mysql2phpThDateTime($data['occurred_at']);},
                    'headerOptions'=>['style'=>'text-align: center;'],
                    'contentOptions'=>['style'=>'width:150px;text-align: center;'],
                    'filter'=>'',
            ],
            [
                    'attribute'=>'updated_at',
                    'value'=>function ($data){return \appxq\sdii\utils\SDdate::mysql2phpThDateSmall($data['updated_at']);},
                    'headerOptions'=>['style'=>'text-align: center;'],
                    'contentOptions'=>['style'=>'width:100px;text-align: center;'],
                    'filter'=>'',
            ],

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
    'id' => 'modal-cases',
    'size'=>'modal-xxl',
    'tabindexEnable'=>false,
]);
?>

<?=  ModalForm::widget([
    'id' => 'modal-items',
    'size'=>'modal-lg',
    'tabindexEnable'=>false,
]);
?>

<?php  $this->registerJs("
        
$('#modal-cases').on('hidden.bs.modal', function(e){
    $.pjax.reload({container:'#cases-grid-pjax'});
});

$('#cases-grid-pjax').on('click', '.item-btn', function() {
    modalItems($(this).attr('data-url'));
});

$('#cases-grid-pjax').on('click', '.place-btn', function() {
    modalItems($(this).attr('data-url'));
});

$('#cases-grid-pjax').on('click', '.person-btn', function() {
    modalItems($(this).attr('data-url'));
});

$('#cases-grid-pjax').on('click', '#modal-addbtn-cases', function() {
    modalCase($(this).attr('data-url'));
});

$('#cases-grid-pjax').on('click', '#modal-delbtn-cases', function() {
    selectionCaseGrid($(this).attr('data-url'));
});

$('#cases-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#cases-grid').yiiGridView('getSelectedRows');
	disabledCaseBtn(key.length);
    },100);
});

$('#cases-grid-pjax').on('click', '.selectionCaseIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledCaseBtn(key.length);
});

$('#cases-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalCase('".Url::to(['cases/update', 'id'=>''])."'+id);
});	

$('#cases-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalCase(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#cases-grid-pjax'});
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

function disabledCaseBtn(num) {
    if(num>0) {
	$('#modal-delbtn-cases').attr('disabled', false);
    } else {
	$('#modal-delbtn-cases').attr('disabled', true);
    }
}

function selectionCaseGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionCaseIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#cases-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalCase(url) {
    $('#modal-cases .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-cases').modal('show')
    .find('.modal-content')
    .load(url);
}

function modalItems(url) {
    $('#modal-items .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-items').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>