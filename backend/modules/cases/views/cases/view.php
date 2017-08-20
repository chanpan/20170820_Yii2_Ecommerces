<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\cases\models\Cases */

$this->title = 'Cases#'.$model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cases-view">

    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="itemModalLabel"><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="modal-body">
        <?= DetailView::widget([
	    'model' => $model,
	    'attributes' => [
		'id',
		'report_of',
		'case_type_id',
		'name',
		'description:ntext',
		'occurred_at',
		'active',
		'created_at',
		'updated_at',
		'created_by',
		'updated_by',
	    ],
	]) ?>
    </div>
</div>
