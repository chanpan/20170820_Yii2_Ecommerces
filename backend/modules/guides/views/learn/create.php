<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\guides\models\Guides */

$this->title = Yii::t('app', 'Create Guides');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Guides'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guides-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
