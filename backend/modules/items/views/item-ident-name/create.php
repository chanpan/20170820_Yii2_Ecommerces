<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemIdentName */

$this->title = Yii::t('app', 'Create Item Ident Name');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item Ident Names'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-ident-name-create">

    <?= $this->render('_form', [
        'model' => $model,
        
    ]) ?>

</div>
