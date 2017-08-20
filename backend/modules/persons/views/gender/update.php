<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\persons\models\Gender */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Gender',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Genders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="gender-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
