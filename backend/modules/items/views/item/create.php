<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\Item */

$this->title = Yii::t('app', 'Create Item');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-create">

    <?= $this->render('_form', [
        'model' => $model,
        'model_ident' => $model_ident
    ]) ?>

</div>
