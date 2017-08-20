<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\guides\models\Guides */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Guides',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Guides'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="guides-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
