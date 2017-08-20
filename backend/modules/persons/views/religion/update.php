<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\persons\models\Religion */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Religion',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Religions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="religion-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
