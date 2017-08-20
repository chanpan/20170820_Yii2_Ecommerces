<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\persons\models\Gender */

$this->title = 'Gender#'.$model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Genders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gender-view">

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
