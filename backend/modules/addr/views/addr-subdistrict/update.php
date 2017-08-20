<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\addr\models\AddrSubdistrict */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Addr Subdistrict',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Addr Subdistricts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="addr-subdistrict-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
