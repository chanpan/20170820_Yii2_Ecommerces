<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\Types */

$this->title = Yii::t('app', 'แก้ไข ประเภทสินค้า: ', [
    'modelClass' => 'Types',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="types-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
