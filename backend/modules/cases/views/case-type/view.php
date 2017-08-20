<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\cases\models\CaseType */

$this->title = 'Case Type#'.$model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Case Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="case-type-view">

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
		'description:ntext',
		'weight',
		'active',
		'created_at',
		'updated_at',
		'created_by',
		'updated_by',
	    ],
	]) ?>
    </div>
</div>
