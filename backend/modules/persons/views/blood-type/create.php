<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\persons\models\BloodType */

$this->title = Yii::t('app', 'Create Blood Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blood Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blood-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
