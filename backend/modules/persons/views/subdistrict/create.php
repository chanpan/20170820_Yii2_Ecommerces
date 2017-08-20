<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\persons\models\Subdistrict */

$this->title = Yii::t('app', 'Create Subdistrict');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subdistricts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subdistrict-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
