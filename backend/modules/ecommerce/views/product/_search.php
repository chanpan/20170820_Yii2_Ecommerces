<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\ProductSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="product-search">

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

    <?= $form->field($model, 'pid') ?>

    <?= $form->field($model, 'bid') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'detail') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'price2') ?>

    <?php // echo $form->field($model, 'qty') ?>

    <?php // echo $form->field($model, 'type_id') ?>

    <?php // echo $form->field($model, 'pro_id') ?>

    <?php // echo $form->field($model, 'color_id') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'size_id') ?>

    <?php // echo $form->field($model, 'brand_id') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <?php // echo $form->field($model, 'create_by') ?>

    <?php // echo $form->field($model, 'update_at') ?>

    <?php // echo $form->field($model, 'update_by') ?>

    <div class="form-group">
	<div class="col-sm-offset-2 col-sm-6">
	    <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
	    <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
	</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
