<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\Promotion */

$this->title = Yii::t('app', 'แก้ไข โปรโมชั่นสินค้า : ', [
    'modelClass' => 'promotion',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Promotions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="promotion-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
