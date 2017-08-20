<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\cases\models\Notify */

$this->title = Yii::t('app', 'Create Notify');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Notifies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notify-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
