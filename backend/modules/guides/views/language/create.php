<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\guides\models\Guidelang */

$this->title = Yii::t('app', 'Create Guidelang');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Guidelangs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guidelang-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
