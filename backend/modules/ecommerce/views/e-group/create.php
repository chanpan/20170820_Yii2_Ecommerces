<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\EGroup */

$this->title = Yii::t('app', ' เพิ่มหมวดหมู่สินค้า');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'หมวดหมู่สินค้า'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="egroup-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
