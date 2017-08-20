<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\addr\models\AddrCountry */

$this->title = Yii::t('app', 'Create Addr Country');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Addr Countries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="addr-country-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
