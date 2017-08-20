<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\cases\models\Cases */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cases',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cases-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
