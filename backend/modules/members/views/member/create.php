<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Member */

$this->title = Yii::t('app', 'Create Member');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Members'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
