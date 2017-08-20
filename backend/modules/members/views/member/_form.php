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
	 <div class="container-fluid">
 
  <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#account">ข้อมูลบัญชี</a></li>
      <li><a data-toggle="tab" href="#menu1">ข้อมูลประวัติ</a></li>
      <li><a data-toggle="tab" href="#menu2">ข้อมูลสำหรับการติดต่อสื่อสาร</a></li>
      <li><a data-toggle="tab" href="#menu3">ข้อมูลสำหรับผู้เสียภาษี</a></li>
  </ul>

  <div class="tab-content">
      <div id="account" class="tab-pane fade in active">
          <div class="row">
              <div class="col-md-12">
                  <h3>ข้อมูลบัญชี</h3>
                    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                    
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
              </div>
          </div>
      </div>
      <div id="menu1" class="tab-pane fade">
          <div class="row">
              <div class="col-md-12">
                  <h3>ข้อมูลประวัติ</h3>
                <?= $form->field($model, 'prefix')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'gender')->textInput() ?>

                <?= $form->field($model, 'birthday')->textInput() ?>
              </div>
          </div>    
      </div>
      <div id="menu2" class="tab-pane fade">
          <div class="row">
              <div class="col-md-12">
                  <h3>ข้อมูลสำหรับการติดต่อสื่อสาร</h3>
                  <?= $form->field($model, 'tel')->widget(\yii\widgets\MaskedInput::className(), [
                        'mask' => '999-999-999-9',
                    ]) ?>
                  <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
                  <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'amphur')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'zipcode')->textInput() ?>
              </div>
          </div>    
      </div>
      <div id="menu3" class="tab-pane fade">
          <div class="row">
              <div class="col-md-12">
                   <h3>ข้อมูลสำหรับผู้เสียภาษี</h3>
                  <?= $form->field($model, 'ident_number',[
                        //'template' => '{label}<div class="col-md-8">{input}{error}{hint}</div>',
                        'horizontalCssClasses' => [
                             'label' => 'col-md-4',
                             'offset' => 'col-sm-offset-1',
                             'wrapper' => 'col-md-4',
                        ]    
                    ])->textInput(['maxlength' => true]) ?>
              </div>
          </div>    
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