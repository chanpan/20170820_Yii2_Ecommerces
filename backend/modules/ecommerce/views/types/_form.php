<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\Types */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="types-form">

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
            echo $form->field($model, 'group_id')->widget(\kartik\select2\Select2::classname(), [
                    'data' => yii\helpers\ArrayHelper::map(backend\modules\ecommerce\models\EGroup::find()->all(), "id", "name"),
                    'options' => ['placeholder' => 'กรุณาเลือกหมวดหมู่สินค้า'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ],['prompt'=>'กรุณาเลือกหมวดหมู่สินค้า']);
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
                $(document).find('#modal-types').modal('hide');
		$.pjax.reload({container:'#types-grid-pjax'});
	    } else if(result.action == 'update') {
		$(document).find('#modal-types').modal('hide');
		$.pjax.reload({container:'#types-grid-pjax'});
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