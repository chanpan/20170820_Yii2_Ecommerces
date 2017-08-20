<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\persons\models\Race */

$this->title = Yii::t('app', 'Create Race');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Races'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="race-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
