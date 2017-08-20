<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\cases\models\CaseItemsType */

$this->title = Yii::t('app', 'Create Case Items Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Case Items Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="case-items-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
