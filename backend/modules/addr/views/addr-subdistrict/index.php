<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;
use yii\web\JsExpression;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\addr\models\AddrSubdistrictSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'ตำบล');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="addr-subdistrict-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'addr-subdistrict-grid-pjax']);?>
    <?php 
        $districtName = empty($searchModel->districtId) ? '' : \backend\modules\addr\models\AddrDistrict::findOne($searchModel->districtId)->name;
        ?>
    <?= GridView::widget([
	'id' => 'addr-subdistrict-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['addr-subdistrict/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-addr-subdistrict']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['addr-subdistrict/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-addr-subdistrict', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionAddrSubdistrictIds'
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
            'name',
            //'districtId',
            [
		'attribute'=>'districtId',
                'value'=>function ($data){ 
                    return $data->district->name;
                },
		'label'=>'อำเภอ',
                'filter'=> kartik\select2\Select2::widget([
                    'initValueText' => $districtName,
                    'model'=>$searchModel,
                    'attribute'=>'districtId',
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
		'class' => 'appxq\sdii\widgets\ActionColumn',
		'contentOptions' => ['style'=>'width:80px;text-align: center;'],
		'template' => '{view} {update} {delete}',
	    ],
        ],
    ]); ?>
    <?php  Pjax::end();?>

</div>

<?=  ModalForm::widget([
    'id' => 'modal-addr-subdistrict',
    'tabindexEnable'=>false,
]);
?>

<?php  $this->registerJs("
$('#addr-subdistrict-grid-pjax').on('click', '#modal-addbtn-addr-subdistrict', function() {
    modalAddrSubdistrict($(this).attr('data-url'));
});

$('#addr-subdistrict-grid-pjax').on('click', '#modal-delbtn-addr-subdistrict', function() {
    selectionAddrSubdistrictGrid($(this).attr('data-url'));
});

$('#addr-subdistrict-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#addr-subdistrict-grid').yiiGridView('getSelectedRows');
	disabledAddrSubdistrictBtn(key.length);
    },100);
});

$('#addr-subdistrict-grid-pjax').on('click', '.selectionAddrSubdistrictIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledAddrSubdistrictBtn(key.length);
});

$('#addr-subdistrict-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalAddrSubdistrict('".Url::to(['addr-subdistrict/update', 'id'=>''])."'+id);
});	

$('#addr-subdistrict-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalAddrSubdistrict(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#addr-subdistrict-grid-pjax'});
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

function disabledAddrSubdistrictBtn(num) {
    if(num>0) {
	$('#modal-delbtn-addr-subdistrict').attr('disabled', false);
    } else {
	$('#modal-delbtn-addr-subdistrict').attr('disabled', true);
    }
}

function selectionAddrSubdistrictGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionAddrSubdistrictIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#addr-subdistrict-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalAddrSubdistrict(url) {
    $('#modal-addr-subdistrict .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-addr-subdistrict').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>