<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\places\models\PlaceSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="place-search">

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

    <?= $form->field($model, 'place_group_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'facility') ?>

    <?php // echo $form->field($model, 'subdistrict_id') ?>

    <?php // echo $form->field($model, 'district_id') ?>

    <?php // echo $form->field($model, 'province_id') ?>

    <?php // echo $form->field($model, 'postal_code') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'longitude') ?>

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
