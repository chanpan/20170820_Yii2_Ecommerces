<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;
use backend\modules\addr\classes\AddrQuery;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\places\models\PlaceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Places');
$this->params['breadcrumbs'][] = $this->title;

$op['language'] = 'th';
	
$q = array_filter($op);

$this->registerJsFile('https://maps.google.com/maps/api/js?key=AIzaSyCq1YL-LUao2xYx3joLEoKfEkLXsEVkeuk&'.http_build_query($q), [
    'position'=>\yii\web\View::POS_HEAD,
    'depends'=>'yii\web\YiiAsset',
]);
$dataGroup = backend\modules\core\classes\CoreFunc::getTaxonomyDropDownList(0, 'place_group');
?>
<div class="place-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php 
        $dataProv = ArrayHelper::map(AddrQuery::getProvince(), 'id', 'name');
        $subdistrictName = empty($searchModel->subdistrict_id) ? '' : \backend\modules\addr\models\AddrSubdistrict::findOne($searchModel->subdistrict_id)->name;
        $districtName = empty($searchModel->district_id) ? '' : \backend\modules\addr\models\AddrDistrict::findOne($searchModel->district_id)->name;
        ?>
    <?php  Pjax::begin(['id'=>'place-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'place-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['place/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-place']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['place/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-place', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionPlaceIds'
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
            [
		'attribute'=>'place_group_id',
                'value'=>function ($data){ 
                    $data_taxonomy = \backend\modules\core\classes\CoreQuery::getTaxonomyById($data->place_group_id);
                    if($data_taxonomy){
                        return $data_taxonomy['name'];
                    }
                    return '';
                },
		'label'=>'กลุ่ม',
                        'contentOptions'=>['style'=>'width:180px;'],     
                'filter'=>Html::activeDropDownList($searchModel, 'place_group_id', $dataGroup, ['encode' => false, 'class'=>'form-control', 'prompt'=>'All']),        
            ],
            'name',
            //'description:ntext',
            //'facility',
            [
		'attribute'=>'subdistrict_id',
                'value'=>function ($data){ 
                    return $data->subdistrict->name;
                },
		'label'=>'ตำบล',
                        'contentOptions'=>['style'=>'width:120px;'],     
                'filter'=> kartik\select2\Select2::widget([
                    'initValueText' => $subdistrictName,
                    'model'=>$searchModel,
                    'attribute'=>'subdistrict_id',
            'options' => ['placeholder' => 'ตำบล', 'prompt'=>'All' ],
            'pluginOptions' => [
                'allowClear' => true,
                'minimumInputLength' => 0,
                'ajax' => [
                    'url' => Url::to(['/addr/addr-subdistrict/get-subdistrict']),
                    'dataType' => 'json',
                    'data' => new JsExpression('function(params) { return {q:params.term}; }')
                ],
		'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
		'templateResult' => new JsExpression('function(result) { return result.text; }'),
		'templateSelection' => new JsExpression('function (result) { return result.text; }'),
            ],
        ]),
            ],  
            [
		'attribute'=>'district_id',
                'value'=>function ($data){ 
                    return $data->district->name;
                },
		'label'=>'อำเภอ',
                        'contentOptions'=>['style'=>'width:120px;'],     
                'filter'=> kartik\select2\Select2::widget([
                    'initValueText' => $districtName,
                    'model'=>$searchModel,
                    'attribute'=>'district_id',
            'options' => ['placeholder' => 'อำเภอ', 'prompt'=>'All' ],
            'pluginOptions' => [
                'allowClear' => true,
                'minimumInputLength' => 0,
                'ajax' => [
                    'url' => Url::to(['/addr/addr-district/get-district']),
                    'dataType' => 'json',
                    'data' => new JsExpression('function(params) { return {q:params.term}; }')
                ],
		'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
		'templateResult' => new JsExpression('function(result) { return result.text; }'),
		'templateSelection' => new JsExpression('function (result) { return result.text; }'),
            ],
        ]),
            ], 
            [
		'attribute'=>'province_id',
                'value'=>function ($data){ 
                    return $data->province->name;
                },
		'label'=>'จังหวัด',
                'filter'=>Html::activeDropDownList($searchModel, 'province_id', $dataProv, ['class'=>'form-control', 'prompt'=>'All']),
                'contentOptions'=>['style'=>'width:120px;'],        
            ], 
                        [
		'attribute'=>'postal_code',
                            'headerOptions'=>['style'=>'text-align: center;'],
                'contentOptions'=>['style'=>'width:90px;text-align: center;'],        
            ], 
            // 'subdistrict_id',
            // 'district_id',
            // 'province_id',
            // 'postal_code',
            // 'latitude',
            // 'longitude',
            // 'active',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',
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
                    'attribute'=>'updated_at',
                    'value'=>function ($data){return \appxq\sdii\utils\SDdate::mysql2phpThDateSmall($data['updated_at']);},
                    'headerOptions'=>['style'=>'text-align: center;'],
                    'contentOptions'=>['style'=>'width:100px;text-align: center;'],
                    'filter'=>'',
            ],
	    [
		'class' => 'appxq\sdii\widgets\ActionColumn',
		'contentOptions' => ['style'=>'width:80px;text-align: center;'],
		'template' => ' {update} {delete}',
	    ],
        ],
    ]); ?>
    <?php  Pjax::end();?>

</div>

<?=  ModalForm::widget([
    'id' => 'modal-place',
    'size'=>'modal-lg',
    'tabindexEnable'=>false,
]);
?>

<?php  $this->registerJs("
$('#place-grid-pjax').on('click', '#modal-addbtn-place', function() {
    modalPlace($(this).attr('data-url'));
});

$('#place-grid-pjax').on('click', '#modal-delbtn-place', function() {
    selectionPlaceGrid($(this).attr('data-url'));
});

$('#place-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#place-grid').yiiGridView('getSelectedRows');
	disabledPlaceBtn(key.length);
    },100);
});

$('#place-grid-pjax').on('click', '.selectionPlaceIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledPlaceBtn(key.length);
});

$('#place-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalPlace('".Url::to(['place/update', 'id'=>''])."'+id);
});	

$('#place-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalPlace(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#place-grid-pjax'});
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

function disabledPlaceBtn(num) {
    if(num>0) {
	$('#modal-delbtn-place').attr('disabled', false);
    } else {
	$('#modal-delbtn-place').attr('disabled', true);
    }
}

function selectionPlaceGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionPlaceIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#place-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalPlace(url) {
    $('#modal-place .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-place').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>