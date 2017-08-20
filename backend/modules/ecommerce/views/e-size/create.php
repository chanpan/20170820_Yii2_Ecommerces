<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\ESizes */

$this->title = Yii::t('app', 'Create Esizes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Esizes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="esizes-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
