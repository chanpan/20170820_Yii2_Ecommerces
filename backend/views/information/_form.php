<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $model common\models\Information */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="information-form">

    <?php $form = ActiveForm::begin([
	'id'=>$model->formName(),
    ]); ?>

    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="itemModalLabel"><?= $this->title;?></h4>
    </div>

    <div class="modal-body">
	<?= $form->field($model, 'name') ?>
        <?php 
                echo $form->field($model, 'detail')->widget(vova07\imperavi\Widget::className(), [
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

        <div class="row">
            <div class="col-md-12">
            <div class="form-group field-product-group">
                <label class="control-label col-md-2">รูปภาพประกอบ</label>
                <?=        \common\lib\images\OverFileUploadUI::widget([
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
        </div>

    </div>
    <div class="modal-footer">
	<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php  $this->registerJs("
function loadImage(){
    $.ajax({
        url:'". yii\helpers\Url::to(['/information/show-image-update'])."',
        type:'get',
        data:{'img':'".$model->image."'},
        success:function(data){
            
            $('.files').html(data);
            
        }
    });
}loadImage();    


$('form#{$model->formName()}').on('beforeSubmit', function(e) {
    var \$form = $(this);
    $.post(
	\$form.attr('action'), //serialize Yii2 form
	\$form.serialize()
    ).done(function(result) {
	if(result.status == 'success') {
	    ". SDNoty::show('result.message', 'result.status') ."
	    if(result.action == 'create') {
		//$(\$form).trigger('reset');
                $(document).find('#modal-information').modal('hide');
		$.pjax.reload({container:'#information-grid-pjax'});
	    } else if(result.action == 'update') {
		$(document).find('#modal-information').modal('hide');
		$.pjax.reload({container:'#information-grid-pjax'});
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