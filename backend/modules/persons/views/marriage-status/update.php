<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\persons\models\MarriageStatus */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Marriage Status',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Marriage Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="marriage-status-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
