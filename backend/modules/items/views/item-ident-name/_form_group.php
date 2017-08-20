<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemIdentName */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="item-ident-name-form">

    <?php $form = ActiveForm::begin([
	'id'=>$model->formName(),
    ]); ?>

    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="itemModalLabel">ชื่อของข้อมูลยืนยันสิ่งของ</h4>
    </div>

    <div class="modal-body">
	

	<?= $form->field($model, 'identification1_name')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'identification2_name')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'identification3_name')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'identification4_name')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'identification5_name')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>
	<?= $form->field($model, 'term_taxonomy_id')->hiddenInput()->label(false) ?>
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
                $(document).find('#modal-tags').modal('hide');
		//$.pjax.reload({container:'#tags-grid-pjax'});
	    } else if(result.action == 'update') {
		$(document).find('#modal-tags').modal('hide');
		//$.pjax.reload({container:'#tags-grid-pjax'});
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