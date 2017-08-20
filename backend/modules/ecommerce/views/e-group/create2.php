<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

?>

<div class="egroup-form">

    <?php $form = ActiveForm::begin([
	'id'=>$model->formName(),
            'enableAjaxValidation'=>true,
             'options' =>['data-pjax' => true ]
    ]); ?>

    <div class="modal-header">
	<?php if($status="product"):?>
        <button type="button" class="close" id="btnClose" aria-hidden="true">&times;</button>
        <?php else:?>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <?php endif; ?>
	<h4 class="modal-title" id="itemModalLabel"><?= $this->title; ?></h4>
    </div>
    <?php $this->registerJS("$('#btnClose').click(function(){
            $('#modal-sub-product').modal('hide');
      })")?>
    <div class="modal-body">
	<?= $form->field($model, 'name',['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1']])->textInput(['maxlength' => true]) ?>

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
 
                alert('ok');
               $.pjax.reload('#product-form-pjax', {timeout : false});
               return false;

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