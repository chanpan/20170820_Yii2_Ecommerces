<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\persons\models\Race */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Race',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Races'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="race-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
