<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\cases\models\CaseType */

$this->title = Yii::t('app', 'Create Case Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Case Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="case-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
