<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\addr\models\AddrDistrict */

$this->title = Yii::t('app', 'Create Addr District');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Addr Districts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="addr-district-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
