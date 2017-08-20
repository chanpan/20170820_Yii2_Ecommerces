<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\addr\models\AddrDistrict */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Addr District',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Addr Districts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="addr-district-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
