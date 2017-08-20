<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $model common\models\Member */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="member-form">

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
    ]); ?>

    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="itemModalLabel">Member</h4>
    </div>

    <div class="modal-body">
	<?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'prefix')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'gender')->textInput() ?>

	<?= $form->field($model, 'birthday')->textInput() ?>

	<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'amphur')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'zipcode')->textInput() ?>

	<?= $form->field($model, 'ident_number')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'status')->textInput() ?>

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
                $(document).find('#modal-member').modal('hide');
		$.pjax.reload({container:'#member-grid-pjax'});
	    } else if(result.action == 'update') {
		$(document).find('#modal-member').modal('hide');
		$.pjax.reload({container:'#member-grid-pjax'});
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