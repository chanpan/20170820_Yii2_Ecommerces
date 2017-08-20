<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;
use yii\helpers\Url;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model backend\modules\addr\models\AddrSubdistrict */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="addr-subdistrict-form">

    <?php $form = ActiveForm::begin([
	'id'=>$model->formName(),
    ]); ?>

    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="itemModalLabel">ตำบล</h4>
    </div>

    <div class="modal-body">
        <?php 
        $districtName = empty($model->districtId) ? '' : \backend\modules\addr\models\AddrDistrict::findOne($model->districtId)->name;
        ?>
        <?= $form->field($model, 'districtId')->widget(\kartik\select2\Select2::className(), [
            'initValueText' => $districtName,
            'options' => ['placeholder' => 'อำเภอ'],
            'pluginOptions' => [
                'allowClear' => true,
                'minimumInputLength' => 0,
                'ajax' => [
                    'url' => Url::to(['/addr/addr-district/get-district']),
                    'dataType' => 'json',
                    'data' => new JsExpression('function(params) { return {q:params.term}; }')
                ],
		'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
		'templateResult' => new JsExpression('function(result) { return result.text; }'),
		'templateSelection' => new JsExpression('function (result) { return result.text; }'),
            ],
        ]) ?>
        
	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

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
                $(document).find('#modal-addr-subdistrict').modal('hide');
		$.pjax.reload({container:'#addr-subdistrict-grid-pjax'});
	    } else if(result.action == 'update') {
		$(document).find('#modal-addr-subdistrict').modal('hide');
		$.pjax.reload({container:'#addr-subdistrict-grid-pjax'});
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