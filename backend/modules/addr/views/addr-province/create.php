<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\addr\models\AddrProvince */

$this->title = Yii::t('app', 'Create Addr Province');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Addr Provinces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="addr-province-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
