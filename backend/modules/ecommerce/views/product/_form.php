<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use vova07\imperavi\Widget;
use kartik\widgets\FileInput;
use yii\helpers\Url;
use \common\lib\images\OverFileUploadUI;
use yii\widgets\Pjax;

use appxq\sdii\widgets\ModalForm;
 
 
?>

<div class="product-form">

    <?php $form = ActiveForm::begin([
	'id'=>$model->formName(),
        'layout' => 'horizontal',
        'fieldConfig' => [
        'horizontalCssClasses' => [
                'label' => 'col-md-2',
                'offset' => 'col-sm-offset-1',
                'wrapper' => 'col-md-8',
            ],
        ],
        'options' => [
            'enctype' => 'multipart/form-data',
             'data-pjax' => '',
            
        ],       
    ]); ?>

    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="itemModalLabel"><?= Html::encode($this->title)?></h4>
    </div>

    <div class="modal-body">
        <div class="col-md-12 col-xs-12">
            <?= $form->field($model, 'pid')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12 col-xs-12">
            <?= $form->field($model, 'bid')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12 col-xs-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 col-xs-12">
            <?php 
                echo $form->field($model, 'detail')->widget(Widget::className(), [
                    'settings' => [
                        'lang' => 'th',
                        'minHeight' => 150,
                        'plugins' => [
                            'clips',
                            'fullscreen'
                        ]
                    ]
                ]);
            ?>
        </div><div class="clearfix"></div>
          
            
             <div class="col-md-12">
                <?= $form->field($model, 'price', [
                        //'template' => '{label}<div class="col-md-8">{input}{error}{hint}</div>',
//                        'horizontalCssClasses' => [
//                             'label' => 'col-md-4',
//                             'offset' => 'col-sm-offset-1',
//                             'wrapper' => 'col-md-6',
//                        ]    
                    ])->textInput() ?>  
            </div>
            <div class="col-md-12">
                <?= $form->field($model, 'price2', [
                         
                    ])->textInput() ?>  
            </div>
        
        
        <div class="col-md-12">
            <?= $form->field($model, 'qty')->textInput([
                                 'type' => 'number'
                            ])?>
            
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12">
            <?php 
            echo $form->field($model, 'pro_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(backend\modules\ecommerce\models\Promotion::find()->all(), "id", "name"),
                    'options' => ['placeholder' => 'เลือกโปรโมชั่น'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ],['prompt'=>'เลือกโปรโมชั่น']);
        ?>
            
            
        </div> 
        <div class="col-md-12">
            <?php 
            echo $form->field($model, 'type_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(backend\modules\ecommerce\models\Types::find()->all(), "id", "name"),
                    'options' => ['placeholder' => 'กรุณาเลือกประเภทสินค้า'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ],['prompt'=>'กรุณาเลือกประเภทสินค้า']);
        ?>
            
            
        </div> 
              
     
        <div class="col-md-12">
            <?php 
                echo $form->field($model, 'color_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(backend\modules\ecommerce\models\EColors::find()->orderBy(['id'=>SORT_DESC])->all(), "id", "name"),
                        'options' => ['multiple' => true,'placeholder' => 'สามารถเลือกได้หลายสี'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
            ?>
        </div>
         
        
        <div class="col-md-12">
           <?php 
                echo $form->field($model, 'size_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(backend\modules\ecommerce\models\ESizes::find()->all(), "id", "name"),
                        'options' => ['multiple' => true,'placeholder' => 'สามารถเลือกได้หลาย Size'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
            ?>
        </div>
         
        <div class="col-md-12">
           <?php 
                echo $form->field($model, 'brand_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(backend\modules\ecommerce\models\Brand::find()->all(), "id", "name"),
                        'options' => ['placeholder' => 'กรุณาเลือกแบรนด์'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
            ?>
        </div>
         
        
       
        <div class="col-md-12">
            <div class="form-group field-product-group">
                <label class="control-label col-md-2">รูปภาพสินค้า</label>
                <?=        OverFileUploadUI::widget([
                'model' => $model,
                'attribute' => 'image',
                'url' => ['image-upload', 'id' => $model->id],
                'gallery' => false,
                'fieldOptions' => [
                    'accept' => 'image/*'
                ],
                'clientOptions' => [
                    'maxFileSize' => 2000000
                ],
                // ...
                'clientEvents' => [
                    'fileuploaddone' => 'function(e, data) {
                                            console.log(e);
                                            console.log(data);
                                        }',
                    'fileuploadfail' => 'function(e, data) {
                                            console.log(e);
                                            console.log(data);
                                        }',
                ],
            ]); ?>
            </div>
        </div>
        <div class="clearfix"></div>
         
    </div>
    <div class="modal-footer">
	<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
      
 <?php $this->registerJS("
    
    $('.btnAdd a').click(function(){
        var url = $(this).attr('data-url');
        //modalProduct(url);
        
        
        console.log('OK'); 
        $.pjax.reload({container:'#chanpan',timeout : false});
    });
    function modalProduct(url) {
        $('#modal-sub-product .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
        $('#modal-sub-product').modal('show')
        .find('.modal-content')
        .load(url);
    }
")?> 



<?php  $this->registerJs("
    
    
function loadImage(){
    $.ajax({
        url:'".Url::to(['/ecommerce/product/show-image-update'])."',
        type:'get',
        data:{'img':'".$model->image."'},
        success:function(data){
            $('.files').html(data);
            
        }
    });
}loadImage();

    $('img').addClass('img img-responsive');
$('form#{$model->formName()}').on('beforeSubmit', function(e) {
    var \$form = $(this);
    $.post(
         '".Url::to(['/ecommerce/product/update?id='.$model->id])."',
	 //serialize Yii2 form
	\$form.serialize()
    ).done(function(result) {
        console.log(result);
	if(result.status == 'success') {
	    ". SDNoty::show('result.message', 'result.status') ."
	    if(result.action == 'create') {
		//$(\$form).trigger('reset');
                $(document).find('#modal-product').modal('hide');
		$.pjax.reload({container:'#product-grid-pjax'});
	    } else if(result.action == 'update') {
		$(document).find('#modal-product').modal('hide');
		$.pjax.reload({container:'#product-grid-pjax'});
	    }
	} else {
	    ". SDNoty::show('result.message', 'result.status') ."
	} 
    }).fail(function() {
	". SDNoty::show("'" . SDHtml::getMsgError() . "Server Error'", '"error"') ."
	console.log('server error');
    });
    return false;
});

");?>

<?php echo $this->registerCss("
    .btn-files{width:300px;margin:0 auto;} img{display: block; max-width: 100%; height: auto;}
    
")?>