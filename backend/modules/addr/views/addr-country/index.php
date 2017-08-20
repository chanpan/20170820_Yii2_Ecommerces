<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\addr\models\AddrCountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'ประเทศ');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="addr-country-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'addr-country-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'addr-country-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['addr-country/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-addr-country']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['addr-country/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-addr-country', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionAddrCountryIds'
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
    'id' => 'modal-addr-country',
    //'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#addr-country-grid-pjax').on('click', '#modal-addbtn-addr-country', function() {
    modalAddrCountry($(this).attr('data-url'));
});

$('#addr-country-grid-pjax').on('click', '#modal-delbtn-addr-country', function() {
    selectionAddrCountryGrid($(this).attr('data-url'));
});

$('#addr-country-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#addr-country-grid').yiiGridView('getSelectedRows');
	disabledAddrCountryBtn(key.length);
    },100);
});

$('#addr-country-grid-pjax').on('click', '.selectionAddrCountryIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledAddrCountryBtn(key.length);
});

$('#addr-country-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalAddrCountry('".Url::to(['addr-country/update', 'id'=>''])."'+id);
});	

$('#addr-country-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalAddrCountry(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#addr-country-grid-pjax'});
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

function disabledAddrCountryBtn(num) {
    if(num>0) {
	$('#modal-delbtn-addr-country').attr('disabled', false);
    } else {
	$('#modal-delbtn-addr-country').attr('disabled', true);
    }
}

function selectionAddrCountryGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionAddrCountryIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#addr-country-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalAddrCountry(url) {
    $('#modal-addr-country .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-addr-country').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>