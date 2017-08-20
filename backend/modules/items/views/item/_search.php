<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="item-search">

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

    <?= $form->field($model, 'item_group_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'identification1') ?>

    <?php // echo $form->field($model, 'identification2') ?>

    <?php // echo $form->field($model, 'identification3') ?>

    <?php // echo $form->field($model, 'identification4') ?>

    <?php // echo $form->field($model, 'identification5') ?>

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
