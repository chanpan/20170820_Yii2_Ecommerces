<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\persons\models\MilitaryStatus */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Military Status',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Military Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="military-status-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
