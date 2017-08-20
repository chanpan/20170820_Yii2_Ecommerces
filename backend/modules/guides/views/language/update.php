<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\guides\models\Guidelang */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Guidelang',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Guidelangs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="guidelang-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
