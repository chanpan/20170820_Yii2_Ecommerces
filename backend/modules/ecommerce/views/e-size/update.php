<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\ESizes */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Esizes',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Esizes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="esizes-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
