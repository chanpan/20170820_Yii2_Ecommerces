<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\EColors */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Ecolors',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ecolors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ecolors-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
