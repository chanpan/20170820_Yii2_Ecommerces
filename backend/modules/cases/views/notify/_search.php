<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\cases\models\NotifySearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="notify-search">

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

    <?= $form->field($model, 'notify_choice') ?>

    <?= $form->field($model, 'notify_no') ?>

    <?= $form->field($model, 'location') ?>

    <?= $form->field($model, 'notify_date') ?>

    <?php // echo $form->field($model, 'notify_from') ?>

    <?php // echo $form->field($model, 'notify_from_type') ?>

    <?php // echo $form->field($model, 'case_type_id') ?>

    <?php // echo $form->field($model, 'case_type_other') ?>

    <?php // echo $form->field($model, 'location_text') ?>

    <?php // echo $form->field($model, 'sdate') ?>

    <?php // echo $form->field($model, 'stime') ?>

    <?php // echo $form->field($model, 'edate') ?>

    <?php // echo $form->field($model, 'etime') ?>

    <?php // echo $form->field($model, 'time_total') ?>

    <?php // echo $form->field($model, 'desc') ?>

    <?php // echo $form->field($model, 'emp_name') ?>

    <?php // echo $form->field($model, 'emp_tel') ?>

    <?php // echo $form->field($model, 'sufferer_name') ?>

    <?php // echo $form->field($model, 'sufferer_tel') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
	<div class="col-sm-offset-2 col-sm-6">
	    <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
	    <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
	</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
