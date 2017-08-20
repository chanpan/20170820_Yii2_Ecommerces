<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\addr\models\AddrProvince */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Addr Province',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Addr Provinces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="addr-province-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
