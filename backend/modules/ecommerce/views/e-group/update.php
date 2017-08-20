<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\EGroup */

$this->title = Yii::t('app', 'แก้ไข {modelClass}: ', [
    'modelClass' => 'หมวดหมู่สินค้า',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'หมวดหมู่สินค้า'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="egroup-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
