<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\persons\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Countries');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="country-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'country-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'country-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['country/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-country']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['country/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-country', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionCountryIds'
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
    'id' => 'modal-country',
    'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#country-grid-pjax').on('click', '#modal-addbtn-country', function() {
    modalCountry($(this).attr('data-url'));
});

$('#country-grid-pjax').on('click', '#modal-delbtn-country', function() {
    selectionCountryGrid($(this).attr('data-url'));
});

$('#country-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#country-grid').yiiGridView('getSelectedRows');
	disabledCountryBtn(key.length);
    },100);
});

$('#country-grid-pjax').on('click', '.selectionCountryIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledCountryBtn(key.length);
});

$('#country-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalCountry('".Url::to(['country/update', 'id'=>''])."'+id);
});	

$('#country-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalCountry(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#country-grid-pjax'});
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

function disabledCountryBtn(num) {
    if(num>0) {
	$('#modal-delbtn-country').attr('disabled', false);
    } else {
	$('#modal-delbtn-country').attr('disabled', true);
    }
}

function selectionCountryGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionCountryIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#country-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalCountry(url) {
    $('#modal-country .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-country').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>