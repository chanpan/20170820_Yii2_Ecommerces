<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\addr\models\AddrProvinceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'จังหวัด');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="addr-province-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'addr-province-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'addr-province-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['addr-province/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-addr-province']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['addr-province/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-addr-province', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionAddrProvinceIds'
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
            'code',
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
    'id' => 'modal-addr-province',
    //'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#addr-province-grid-pjax').on('click', '#modal-addbtn-addr-province', function() {
    modalAddrProvince($(this).attr('data-url'));
});

$('#addr-province-grid-pjax').on('click', '#modal-delbtn-addr-province', function() {
    selectionAddrProvinceGrid($(this).attr('data-url'));
});

$('#addr-province-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#addr-province-grid').yiiGridView('getSelectedRows');
	disabledAddrProvinceBtn(key.length);
    },100);
});

$('#addr-province-grid-pjax').on('click', '.selectionAddrProvinceIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledAddrProvinceBtn(key.length);
});

$('#addr-province-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalAddrProvince('".Url::to(['addr-province/update', 'id'=>''])."'+id);
});	

$('#addr-province-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalAddrProvince(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#addr-province-grid-pjax'});
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

function disabledAddrProvinceBtn(num) {
    if(num>0) {
	$('#modal-delbtn-addr-province').attr('disabled', false);
    } else {
	$('#modal-delbtn-addr-province').attr('disabled', true);
    }
}

function selectionAddrProvinceGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionAddrProvinceIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#addr-province-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalAddrProvince(url) {
    $('#modal-addr-province .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-addr-province').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>