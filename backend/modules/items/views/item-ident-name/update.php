<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemIdentName */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Item Ident Name',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item Ident Names'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="item-ident-name-update">

    <?= $this->render('_form', [
        'model' => $model,
        
    ]) ?>

</div>
