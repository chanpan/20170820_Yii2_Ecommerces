<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Information */

$this->title = Yii::t('app', 'ข้อมูลข่าวสาร: ', [
    'modelClass' => 'Information',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Informations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="information-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
