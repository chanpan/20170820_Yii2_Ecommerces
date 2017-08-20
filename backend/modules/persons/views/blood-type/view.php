<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\persons\models\BloodType */

$this->title = 'Blood Type#'.$model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blood Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blood-type-view">

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
		'weight',
		'active',
	    ],
	]) ?>
    </div>
</div>
