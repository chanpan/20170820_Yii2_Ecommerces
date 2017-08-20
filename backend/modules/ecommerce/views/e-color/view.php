<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\EColors */

$this->title = 'Ecolors#'.$model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ecolors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ecolors-view">

    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="itemModalLabel"><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="modal-body">
        <?= DetailView::widget([
	    'model' => $model,
	    'attributes' => [
		'id',
		'name',
	    ],
	]) ?>
    </div>
</div>
