<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\places\models\Place */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Place',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Places'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="place-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
