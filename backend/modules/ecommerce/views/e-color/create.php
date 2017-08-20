<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\EColors */

$this->title = Yii::t('app', 'Create Ecolors');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ecolors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ecolors-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
