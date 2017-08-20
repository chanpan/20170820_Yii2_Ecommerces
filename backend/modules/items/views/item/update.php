<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\Item */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Item',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="item-update">

    <?= $this->render('_form', [
        'model' => $model,
        'model_ident' => $model_ident
    ]) ?>

</div>
