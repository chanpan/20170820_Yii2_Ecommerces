<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\persons\models\MarriageStatus */

$this->title = Yii::t('app', 'Create Marriage Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Marriage Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marriage-status-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
