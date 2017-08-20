<?php

use yii\helpers\Html;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

$this->title = Yii::t('app', 'ข้อมูลสินค้า : ', [
    'modelClass' => 'Product',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
 <div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div> 
 <?=  ModalForm::widget([
    'id' => 'modal-sub-product',
    'size'=>'modal-sm',
   
]);?>  
