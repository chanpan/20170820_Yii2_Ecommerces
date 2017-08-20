<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\cases\models\Notify */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Notify',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Notifies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="notify-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
