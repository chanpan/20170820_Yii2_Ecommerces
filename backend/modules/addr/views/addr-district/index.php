<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;
use backend\modules\addr\classes\AddrQuery;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\addr\models\AddrDistrictSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'อำเภอ');
$this->params['breadcrumbs'][] = $this->title;

$dataProv = ArrayHelper::map(AddrQuery::getProvince(), 'id', 'name');

?>
<div class="addr-district-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'addr-district-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'addr-district-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['addr-district/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-addr-district']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['addr-district/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-addr-district', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionAddrDistrictIds'
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
            [
		'attribute'=>'provinceId',
                'value'=>function ($data){ 
                    return $data->province->name;
                },
		'label'=>'จังหวัด',
                'filter'=>Html::activeDropDownList($searchModel, 'provinceId', $dataProv, ['class'=>'form-control', 'prompt'=>'All']),
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
    'id' => 'modal-addr-district',
    'tabindexEnable'=>false,
    //'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#addr-district-grid-pjax').on('click', '#modal-addbtn-addr-district', function() {
    modalAddrDistrict($(this).attr('data-url'));
});

$('#addr-district-grid-pjax').on('click', '#modal-delbtn-addr-district', function() {
    selectionAddrDistrictGrid($(this).attr('data-url'));
});

$('#addr-district-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#addr-district-grid').yiiGridView('getSelectedRows');
	disabledAddrDistrictBtn(key.length);
    },100);
});

$('#addr-district-grid-pjax').on('click', '.selectionAddrDistrictIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledAddrDistrictBtn(key.length);
});

$('#addr-district-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalAddrDistrict('".Url::to(['addr-district/update', 'id'=>''])."'+id);
});	

$('#addr-district-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalAddrDistrict(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#addr-district-grid-pjax'});
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

function disabledAddrDistrictBtn(num) {
    if(num>0) {
	$('#modal-delbtn-addr-district').attr('disabled', false);
    } else {
	$('#modal-delbtn-addr-district').attr('disabled', true);
    }
}

function selectionAddrDistrictGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionAddrDistrictIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#addr-district-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalAddrDistrict(url) {
    $('#modal-addr-district .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-addr-district').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>