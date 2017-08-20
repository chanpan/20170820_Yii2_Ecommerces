<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\addr\models\AddrSubdistrict */

$this->title = Yii::t('app', 'Create Addr Subdistrict');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Addr Subdistricts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="addr-subdistrict-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
