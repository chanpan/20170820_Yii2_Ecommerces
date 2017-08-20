<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel common\models\InformationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'ข้อมูลข่าวสาร');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="information-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'information-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'information-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['information/update','id'=>'','status'=>'create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-information']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['information/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-information', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionInformationIds'
		],
		'headerOptions' => ['style'=>'text-align: center;'],
		'contentOptions' => ['style'=>'width:40px;text-align: center;'],
	    ],
	    [
		'class' => 'yii\grid\SerialColumn',
		'headerOptions' => ['style'=>'text-align: center;'],
		'contentOptions' => ['style'=>'width:60px;text-align: center;'],
	    ],
            [
              'format'=>'raw',
                'contentOptions'=>['width'=>'100'],
                'attribute'=>'',
                'value'=>function($model){
                    $images="";
                    if(!empty($model->image)){
                        $img_name = explode(",", $model->image);
                        $images = Yii::getAlias('@storageUrl') . '/web/img/'.$img_name[0];
                    } 
                   return "<img src='".$images."' class='img img-responsive' style='width:100px;'>"; 
                }
            ],
            'name:ntext',
             

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
    'id' => 'modal-information',
    'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#information-grid-pjax').on('click', '#modal-addbtn-information', function() {
    modalInformation($(this).attr('data-url'));
});

$('#information-grid-pjax').on('click', '#modal-delbtn-information', function() {
    selectionInformationGrid($(this).attr('data-url'));
});

$('#information-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#information-grid').yiiGridView('getSelectedRows');
	disabledInformationBtn(key.length);
    },100);
});

$('#information-grid-pjax').on('click', '.selectionInformationIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledInformationBtn(key.length);
});

$('#information-grid-pjax').on('click', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalInformation('".Url::to(['information/update', 'id'=>''])."'+id);
});	

$('#information-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalInformation(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#information-grid-pjax'});
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

function disabledInformationBtn(num) {
    if(num>0) {
	$('#modal-delbtn-information').attr('disabled', false);
    } else {
	$('#modal-delbtn-information').attr('disabled', true);
    }
}

function selectionInformationGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionInformationIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#information-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalInformation(url) {
    $('#modal-information .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-information').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>