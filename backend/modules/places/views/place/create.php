<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\places\models\Place */

$this->title = Yii::t('app', 'Create Place');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Places'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="place-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
