<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\persons\models\Province */

$this->title = Yii::t('app', 'Create Province');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Provinces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="province-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
