<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\Brand */

$this->title = Yii::t('app', 'เพิ่มแบรนด์สินค้า');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
