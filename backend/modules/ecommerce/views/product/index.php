<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\ecommerce\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'ข้อมูลสินค้า');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="product-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'product-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'product-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['product/update','status'=>'create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-product']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['product/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-product', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionProductIds'
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
                'attribute'=>'',
                'value'=>function($model){
                    $images="";
                    if(!empty($model->image)){
                        $img_name = explode(",", $model->image);
                        $images = Yii::getAlias('@storageUrl') . '/web/img/'.$img_name[0];
                    } 
                   return "<img src='".$images."' class='img img-responsive' style='width:150px;'>"; 
                }
            ],
            'pid',
            'name',
            [
              'format'=>'raw',
                'attribute'=>'type_id',
                'value'=>function($model){
                   return $model->types->name; 
                },
                'filter'=> yii\helpers\ArrayHelper::map(backend\modules\ecommerce\models\Types::find()->asArray()->all(), 'id', 'name')
            ],
            'price:decimal',
            'price2:decimal',
            'qty',
//            [
//                'format'=>'raw',
//                'attribute'=>'size_id',
//                'value'=>function($model){
//                    
//                    $this->registerJS("
//                         $.ajax({
//                            url:'".Url::to(['/ecommerce/product/size-value','size'=>$model->size_id,'id'=>$model->id])."',
//                            type:'get',
//                            success:function(data){
//                                $('#size_id'+".$model->id.").html(data);
//                            }
//                         });
//                    "); 
//                    return "<div id='size_id".$model->id."'></div>";
//                },
//                     
//            ],
//            [
//                'format'=>'raw',
//                'attribute'=>'color_id',
//                'value'=>function($model){
//                    
//                    $this->registerJS("
//                         $.ajax({
//                            url:'".Url::to(['/ecommerce/product/color-value','color'=>$model->color_id,'id'=>$model->id])."',
//                            type:'get',
//                            success:function(data){
//                                $('#color_id_id'+".$model->id.").html(data);
//                            }
//                         });
//                    "); 
//                    return "<div id='color_id_id".$model->id."'></div>";
//                },
//                    
//            ],            
                        
            // 'group_id',
            // 'color_id',
            // 'image:ntext',

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
    'id' => 'modal-product',
    'size'=>'modal-lg',
   
]);
?>

<?php  $this->registerJs("
$('#product-grid-pjax').on('click', '#modal-addbtn-product', function() {
    modalProduct($(this).attr('data-url'));
});

$('#product-grid-pjax').on('click', '#modal-delbtn-product', function() {
    selectionProductGrid($(this).attr('data-url'));
});

$('#product-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#product-grid').yiiGridView('getSelectedRows');
	disabledProductBtn(key.length);
    },100);
});

$('#product-grid-pjax').on('click', '.selectionProductIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledProductBtn(key.length);
});

$('#product-grid-pjax').on('click', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalProduct('".Url::to(['product/update', 'id'=>''])."'+id);
});	

$('#product-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalProduct(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#product-grid-pjax'});
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

function disabledProductBtn(num) {
    if(num>0) {
	$('#modal-delbtn-product').attr('disabled', false);
    } else {
	$('#modal-delbtn-product').attr('disabled', true);
    }
}

function selectionProductGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionProductIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#product-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalProduct(url) {
    $('#modal-product .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-product').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>