<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\persons\models\Religion */

$this->title = Yii::t('app', 'Create Religion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Religions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="religion-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
