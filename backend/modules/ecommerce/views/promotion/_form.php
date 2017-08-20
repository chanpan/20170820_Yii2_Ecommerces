<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;
use vova07\imperavi\Widget;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\Promotion */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="promotion-form">

    <?php $form = ActiveForm::begin([
	'id'=>$model->formName(),
    ]); ?>

    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="itemModalLabel"><?= Html::encode($this->title)?></h4>
    </div>

    <div class="modal-body">
	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

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

        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'discount')->textInput() ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
            <?= 
                $form->field($model, 'date_start')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'วันที่เริ่มจัดโปร'],
                    'language' => 'th',
                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                    //'type' => DatePicker::TYPE_INPUT,
                    'pluginOptions' => [
                        'autoclose'=>true
                    ]
                ])         
            ?>
        </div>
        <div class="col-md-6">
            <?= 
                $form->field($model, 'date_end')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'วันที่เริ่มจัดโปร'],
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,

                    'language' => 'th',
                    'pluginOptions' => [
                        'autoclose'=>true
                    ]
                ])         
            ?>
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
                $(document).find('#modal-promotion').modal('hide');
		$.pjax.reload({container:'#promotion-grid-pjax'});
	    } else if(result.action == 'update') {
		$(document).find('#modal-promotion').modal('hide');
		$.pjax.reload({container:'#promotion-grid-pjax'});
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