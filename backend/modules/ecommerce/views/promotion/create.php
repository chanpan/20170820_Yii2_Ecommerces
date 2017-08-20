<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\Promotion */

$this->title = Yii::t('app', 'เพิ่ม โปรโมชั่นสินค้า');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Promotions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promotion-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
