<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\persons\models\PersonSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="person-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
	'layout' => 'horizontal',
	'fieldConfig' => [
	    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
	    'horizontalCssClasses' => [
		'label' => 'col-sm-2',
		'offset' => 'col-sm-offset-3',
		'wrapper' => 'col-sm-6',
		'error' => '',
		'hint' => '',
	    ],
	],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'person_group_id') ?>

    <?= $form->field($model, 'image_id') ?>

    <?= $form->field($model, 'id_number') ?>

    <?= $form->field($model, 'id_card_issue_date') ?>

    <?php // echo $form->field($model, 'id_card_issue_at') ?>

    <?php // echo $form->field($model, 'id_card_expiry_date') ?>

    <?php // echo $form->field($model, 'passport_number') ?>

    <?php // echo $form->field($model, 'th_title_name') ?>

    <?php // echo $form->field($model, 'th_first_name') ?>

    <?php // echo $form->field($model, 'th_middle_name') ?>

    <?php // echo $form->field($model, 'th_last_name') ?>

    <?php // echo $form->field($model, 'th_nickname') ?>

    <?php // echo $form->field($model, 'en_title_name') ?>

    <?php // echo $form->field($model, 'en_first_name') ?>

    <?php // echo $form->field($model, 'en_middle_name') ?>

    <?php // echo $form->field($model, 'en_last_name') ?>

    <?php // echo $form->field($model, 'en_nickname') ?>

    <?php // echo $form->field($model, 'raceId') ?>

    <?php // echo $form->field($model, 'nationality_id') ?>

    <?php // echo $form->field($model, 'blood_type_id') ?>

    <?php // echo $form->field($model, 'religion_id') ?>

    <?php // echo $form->field($model, 'gender_id') ?>

    <?php // echo $form->field($model, 'military_status_id') ?>

    <?php // echo $form->field($model, 'marriage_status_id') ?>

    <?php // echo $form->field($model, 'birthdate') ?>

    <?php // echo $form->field($model, 'occupation') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'subdistrictId') ?>

    <?php // echo $form->field($model, 'districtId') ?>

    <?php // echo $form->field($model, 'province_id') ?>

    <?php // echo $form->field($model, 'country_id') ?>

    <?php // echo $form->field($model, 'postal_code') ?>

    <?php // echo $form->field($model, 'phone_number') ?>

    <?php // echo $form->field($model, 'mobile_number') ?>

    <?php // echo $form->field($model, 'work_number') ?>

    <?php // echo $form->field($model, 'fax_number') ?>

    <?php // echo $form->field($model, 'other_number') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'facebook') ?>

    <?php // echo $form->field($model, 'twitter') ?>

    <?php // echo $form->field($model, 'line') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
	<div class="col-sm-offset-2 col-sm-6">
	    <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
	    <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
	</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
