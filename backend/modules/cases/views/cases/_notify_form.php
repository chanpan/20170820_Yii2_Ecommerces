    <?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\modules\cases\models\Cases */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $this yii\web\View */
/* @var $model backend\modules\cases\models\Cases */
?>
<div style="padding:20px 0;">
	
<?php $form = ActiveForm::begin([
	  'id'=>$notifyModel->formName(),
]); ?>

	<div class="row">
		<div class="col-md-2"><?= $form->field($notifyModel, 'notify_choice')->textInput(['maxlength' => true,'disabled'=>true]);?></div>
		<div class="col-md-2"><?= $form->field($notifyModel, 'notify_no')->textInput(['maxlength' => true,'disabled'=>true]) ?></div>
		<div class="col-md-5"><?= $form->field($notifyModel, 'write_at')->textInput(['maxlength' => true,'disabled'=>true]) ?></div>
		<div class="col-md-3">	
        <?= $form->field($notifyModel, 'notify_date')->textInput(['maxlength' => true,'disabled'=>true]) ?>
		</div>
	</div>

		<?= $form->field($notifyModel, 'name')->textInput(['maxlength' => true,'disabled'=>true]) ?>
	<div class="row">
		<div class="col-md-8"><?= $form->field($notifyModel, 'case_type_id')->dropdownList(\backend\modules\cases\models\CaseType::find()->IndexBy('id')->select('name')->column(),['disabled'=>'disabled']) ?></div>
		<div class="col-md-4"><?= $form->field($notifyModel, 'case_type_other')->textInput(['maxlength' => true]) ?></div>
	</div>
    <div class="row">
		    <div class="col-md-8"><?= $form->field($notifyModel, 'notify_from')->textInput(['maxlength' => true,'disabled'=>true]) ?></div>
		    <div class="col-md-4">	<?php $form->field($notifyModel, 'notify_from_type')->inline()->radioList(\backend\modules\core\classes\CoreFunc::itemAlias('notify_from_type'),['disabled'=>'disabled']) ?></div>
	</div>

  <div class="row">
	<div class="col-md-3">
		<?= $form->field($notifyModel, 'sdate')->textInput(['maxlength' => true,'disabled'=>true]) ?>
	</div>
	<div class="col-md-3">
		<?= $form->field($notifyModel, 'stime')->textInput(['maxlength' => true,'disabled'=>true]) ?>
	</div>
	<div class="col-md-3">
		<?= $form->field($notifyModel, 'edate')->textInput(['maxlength' => true,'disabled'=>true]) ?>	
	</div>
	<div class="col-md-3">
		<?= $form->field($notifyModel, 'etime')->textInput(['maxlength' => true,'disabled'=>true]) ?>	
	</div>
</div>


  <div class="form-group">
    <label for="location_text"><?=$notifyModel->getAttributeLabel('location_text');?></label>
    <div class="well">
      <?=$notifyModel->location_text;?>
    </div>
  </div>

  <div class="form-group">
    <label for="desc"><?=$notifyModel->getAttributeLabel('desc');?></label>
    <div class="well">
      <?=$notifyModel->desc;?>
    </div>
  </div>

   <?php ActiveForm::end(); ?>
	 </div>