<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $model backend\modules\persons\models\Person */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="person-form" style="padding:10px;">

    <?php $form = ActiveForm::begin([
    'id'=>$model->formName(),
    ]); ?>

    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="itemModalLabel">Person</h4>
    </div>

    <div class="modal-body">

			<div class="row">
					<?php
						$taxonomy = backend\modules\core\classes\CoreFunc::getTaxonomyDropDownList(0, 'person_group');
						$dataItemsType = \backend\modules\cases\classes\CaseQuery::getCaseItemsType('person');
					?>
					<div class="col-md-3 "><?= $form->field($model, 'case_items_type_id')->dropDownList(\yii\helpers\ArrayHelper::map($dataItemsType, 'id', 'name')) ?></div>
					<div class="col-md-3 sdbox-col"><?= $form->field($model, 'person_group_id')->dropDownList($taxonomy, ['encode' => false, 'prompt' => 'none']) ?></div>
					<div class="col-md-3">
					<div>
					   <?= $form->field($model, 'file')->widget(\trntv\filekit\widget\Upload::classname(), [
							'url'=>['photo-upload'],
							'id'=>'wperson-photo'
						]) ?>
					</div>
					 
					</div>
			</div>

			<div class="row">
				<div class="col-md-6">  
				<?= $form->field($model, 'id_number')->widget(\yii\widgets\MaskedInput::className(), [
					'mask' => '9-9999-99999-99-9',
				]) ?>
				</div>
				<div class="col-md-6">   
				 <?= $form->field($model, 'passport_number')->textInput(['maxlength' => true]) ?>
				 </div>
			</div>
			<div class="row">
				<div class="col-md-4">  <?= $form->field($model, 'id_card_issue_at')->textInput(['maxlength' => true]) ?></div>
				<div class="col-md-4">  
				<?= $form->field($model, 'id_card_expiry_date')->widget(\kartik\widgets\DatePicker::classname(), [
						'options' => [],
						'language'=>'th',
						'pluginOptions' => [
							'autoclose'=>true,
							'format' => 'yyyy-mm-dd'
						]
					]);
				?>
				</div>
				<div class="col-md-4">  
				<?= $form->field($model, 'id_card_issue_date')->widget(\kartik\widgets\DatePicker::classname(), [
						'options' => [],
						'language'=>'th',
						'pluginOptions' => [
							'autoclose'=>true,
							 'format' => 'yyyy-mm-dd'
						]
					]);
				?>
				</div>
			</div>

<hr>

<div class="row">
	<div class="col-md-2"> <?= $form->field($model, 'th_nickname')->textInput(['maxlength' => true]) ?></div>
	<div class="col-md-2"> <?= $form->field($model, 'th_title_name')->textInput(['maxlength' => true]) ?></div>
	<div class="col-md-3"> <?= $form->field($model, 'th_first_name')->textInput(['maxlength' => true]) ?></div>
	<div class="col-md-2">  <?= $form->field($model, 'th_middle_name')->textInput(['maxlength' => true]) ?></div>
	<div class="col-md-3">  <?= $form->field($model, 'th_last_name')->textInput(['maxlength' => true]) ?></div>
</div>

<div class="row">
	<div class="col-md-2"> <?= $form->field($model, 'en_nickname')->textInput(['maxlength' => true]) ?></div>
	<div class="col-md-2"> <?= $form->field($model, 'en_title_name')->textInput(['maxlength' => true]) ?></div>
	<div class="col-md-3">   <?= $form->field($model, 'en_first_name')->textInput(['maxlength' => true]) ?></div>
	<div class="col-md-2">    <?= $form->field($model, 'en_middle_name')->textInput(['maxlength' => true]) ?></div>
	<div class="col-md-3">    <?= $form->field($model, 'en_last_name')->textInput(['maxlength' => true]) ?></div>
</div>
<hr>
<div class="row">
	<div class="col-md-2">
	<?= $form->field($model, 'raceId')->widget(\kartik\select2\Select2::classname(), [
              'data' => \backend\modules\persons\models\Race::find()->select(['name'])->indexBy('id')->orderBy('name ASC')->column(),
              'options' => ['placeholder' => 'เชื้อชาติ...'],
              'pluginOptions' => [
                  'allowClear' => true
              ],
     ]); ?>
	</div>
	<div class="col-md-2">
		<?= $form->field($model, 'nationality_id')->widget(\kartik\select2\Select2::classname(), [
              'data' => \backend\modules\persons\models\Nationality::find()->select(['name'])->indexBy('id')->orderBy('name ASC')->column(),
              'options' => ['placeholder' => 'เชื้อชาติ...'],
              'pluginOptions' => [
                  'allowClear' => true
              ],
     ]); ?>
	</div>
	<div class="col-md-2">
		<?= $form->field($model, 'blood_type_id')->widget(\kartik\select2\Select2::classname(), [
              'data' => \backend\modules\persons\models\BloodType::find()->select(['name'])->indexBy('id')->orderBy('name ASC')->column(),
              'options' => ['placeholder' => '...'],
              'pluginOptions' => [
                  'allowClear' => true
              ],
     ]); ?>
	</div>
	<div class="col-md-2">
			<?= $form->field($model, 'religion_id')->widget(\kartik\select2\Select2::classname(), [
              'data' => \backend\modules\persons\models\Religion::find()->select(['name'])->indexBy('id')->orderBy('name ASC')->column(),
              'options' => ['placeholder' => '...'],
              'pluginOptions' => [
                  'allowClear' => true
              ],
     ]); ?>
	</div>
	<div class="col-md-2">
		<?= $form->field($model, 'gender_id')->widget(\kartik\select2\Select2::classname(), [
				'data' => \backend\modules\persons\models\Gender::find()->select(['name'])->indexBy('id')->orderBy('name ASC')->column(),
				'options' => ['placeholder' => ''],
				'pluginOptions' => [
					'allowClear' => true
				],
		]); ?>
	</div>
	<div class="col-md-2">
		<?= $form->field($model, 'military_status_id')->widget(\kartik\select2\Select2::classname(), [
				'data' => \backend\modules\persons\models\MilitaryStatus::find()->select(['name'])->indexBy('id')->orderBy('name ASC')->column(),
				'options' => ['placeholder' => ''],
				'pluginOptions' => [
					'allowClear' => true
				],
		]); ?>
	</div>
</div>
    
<div class="row">
	<div class="col-md-2">
		<?= $form->field($model, 'marriage_status_id')->widget(\kartik\select2\Select2::classname(), [
              'data' => \backend\modules\persons\models\MarriageStatus::find()->select(['name'])->indexBy('id')->orderBy('name ASC')->column(),
              'options' => ['placeholder' => ''],
              'pluginOptions' => [
                  'allowClear' => true
              ],
     ]); ?>
	</div>
	<div class="col-md-4">
	<?= $form->field($model, 'birthdate')->widget(\kartik\widgets\DatePicker::classname(), [
			'options' => ['placeholder' => 'Birth date ...'],
			'language'=>'th',
			'pluginOptions' => [
				'autoclose'=>true,
				'format' => 'yyyy-mm-dd'
			]
		]);
	?>
	</div>
	<div class="col-md-6"> 
	<?= $form->field($model, 'occupation')->textInput(['maxlength' => true]) ?>
	</div>
</div>
    <hr>
  <?= $form->field($model, 'address')->textarea(['rows' => 2]) ?>

	<?php echo $form->field($model, 'province_id')->widget(appxq\sdii\widgets\SDProvincev2::className(), [
            'fields' => [
                    ['label'=>'province', 'attribute'=>'province_id'],
                    ['label'=>'amphur', 'attribute'=>'districtId'],
                    ['label'=>'tumbon', 'attribute'=>'subdistrictId'],
                ],
            'enable_tumbon'=>true
     ])->label('จังหวัด อำเภอ ตำบล');?>


<div class="row">
	<div class="col-md-4">  
	 <?= $form->field($model, 'country_id')->widget(\kartik\select2\Select2::classname(), [
              'data' => \backend\modules\persons\models\Country::find()->select(['name'])->indexBy('id')->orderBy('name ASC')->column(),
              'options' => ['placeholder' => 'Country ...'],
              'pluginOptions' => [
                  'allowClear' => true
              ],
     ]); ?>
	</div>
	<div class="col-md-4">    <?= $form->field($model, 'postal_code')->textInput(['maxlength' => true]) ?></div>
	<div class="col-md-4">    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?></div>
</div>
<hr>
<div class="row">
	<div class="col-md-3"><?= $form->field($model, 'mobile_number')->textInput(['maxlength' => true]) ?></div>
	<div class="col-md-3"><?= $form->field($model, 'work_number')->textInput(['maxlength' => true]) ?></div>
	<div class="col-md-3"><?= $form->field($model, 'fax_number')->textInput(['maxlength' => true]) ?></div>
	<div class="col-md-3"><?= $form->field($model, 'other_number')->textInput(['maxlength' => true]) ?></div>
</div>

    <div class="row">
		<div class="col-md-3">    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?></div>
		<div class="col-md-3">    <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?></div>
		<div class="col-md-3">    <?= $form->field($model, 'twitter')->textInput(['maxlength' => true]) ?></div>
		<div class="col-md-3">    <?= $form->field($model, 'line')->textInput(['maxlength' => true]) ?></div>
	</div>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'active')->checkbox() ?>

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
		$(\$form).trigger('reset');
		$.pjax.reload({container:'#person-grid-pjax'});
	    } else if(result.action == 'update') {
		$(document).find('#modal-person').modal('hide');
		$.pjax.reload({container:'#person-grid-pjax'});
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