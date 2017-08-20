<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\persons\models\Nationality */

$this->title = 'Nationality#'.$model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nationalities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nationality-view">

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
