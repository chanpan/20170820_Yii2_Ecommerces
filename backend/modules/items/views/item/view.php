<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\Item */

$this->title = 'Item#'.$model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-view">

    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="itemModalLabel"><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="modal-body">
        <?= DetailView::widget([
	    'model' => $model,
	    'attributes' => [
		'id',
		'item_group_id',
		'name',
		'description',
		'identification1',
		'identification2',
		'identification3',
		'identification4',
		'identification5',
		'active',
		'created_at',
		'updated_at',
		'created_by',
		'updated_by',
	    ],
	]) ?>
    </div>
</div>
