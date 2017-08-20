<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;
use yii\helpers\Url;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\modules\guides\models\Guides */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="guides-form">

    <?php $form = ActiveForm::begin([
	'id'=>$model->formName(),
    ]); ?>

    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="itemModalLabel">Guides</h4>
    </div>

    <div class="modal-body">
        <?= $form->field($model, 'name')->textInput() ?>
	<?= $form->field($model, 'install')->textInput() ?>
        <div class="col-md-6 sdbox-col">
            <?php
//                $form->field($model, 'codes')->widget(
//                    'appxq\sdii\widgets\AceEditor', [
//                    'mode' => 'javascript', // programing language mode. Default "html"
//                    //'theme'=>'github',
//                    //'readOnly'=>false,
//                    'id' => 'js_editors'
//                        ]
//                )
            ?>
        </div>
	<?php  
            echo $form->field($model, 'codes')->widget(vova07\imperavi\Widget::className(), [
                'settings' => [
                        'lang' => 'th',
                        'minHeight' => 30,
                        'imageManagerJson' => Url::to(['/guides/upload/images-get']),
                        'fileManagerJson' => Url::to(['/guides/upload/files-get']),
                        'imageUpload' => Url::to(['/guides/upload/image-upload']),
                        'fileUpload' => Url::to(['/guides/upload/file-upload']),
                        'plugins' => [
                            'fontcolor',
                            'fontfamily',
                            'fontsize',
                            'textdirection',
                            'textexpander',
                            'counter',
                            'table',
                            'definedlinks',
                            'video',
                            'imagemanager',
                            'filemanager',
                            'limiter',
                            'fullscreen',
                        ]
                    ]
            ]);
        ?>
        
     <?php 
        echo $form->field($model, 'lang')->widget(Select2::classname(), [
            'data' => yii\helpers\ArrayHelper::map(\backend\modules\guides\models\Guidelang::find()->all(),'id','name'),
            'language' => 'th',
            'options' => ['placeholder' => 'เลือกภาษา ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
     ?>

	<?php 
        echo $form->field($model, 'types')->widget(Select2::classname(), [
            'data' => yii\helpers\ArrayHelper::map(\backend\modules\guides\models\Guidetype::find()->all(),'id','name'),
            'language' => 'th',
            'options' => ['placeholder' => 'เลือกประเภท...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
     ?>

    </div>
    <div class="modal-footer">
	<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php  $this->registerJs("
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
                $(document).find('#modal-guides').modal('hide');
		$.pjax.reload({container:'#guides-grid-pjax'});
	    } else if(result.action == 'update') {
		$(document).find('#modal-guides').modal('hide');
		$.pjax.reload({container:'#guides-grid-pjax'});
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