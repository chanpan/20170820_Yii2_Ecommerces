<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\persons\models\Subdistrict */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Subdistrict',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subdistricts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="subdistrict-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
