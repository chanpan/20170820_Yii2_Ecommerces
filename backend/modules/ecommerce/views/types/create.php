<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\Types */

$this->title = Yii::t('app', 'เพิ่ม ประเภทสินค้า');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="types-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
