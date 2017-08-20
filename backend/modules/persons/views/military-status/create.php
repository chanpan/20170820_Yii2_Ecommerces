<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\persons\models\MilitaryStatus */

$this->title = Yii::t('app', 'Create Military Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Military Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="military-status-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
