<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\addr\models\AddrCountry */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Addr Country',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Addr Countries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="addr-country-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
