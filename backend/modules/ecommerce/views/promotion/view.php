<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\Promotion */

$this->title = 'Promotion#'.$model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Promotions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promotion-view">

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
		'detail:ntext',
		'discount',
		'date_start',
		'date_end',
	    ],
	]) ?>
    </div>
</div>
