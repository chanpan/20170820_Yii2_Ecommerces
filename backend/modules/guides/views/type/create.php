<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\guides\models\Guidetype */

$this->title = Yii::t('app', 'Create Guidetype');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Guidetypes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guidetype-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
