<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\guides\models\Guidetype */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Guidetype',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Guidetypes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="guidetype-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
