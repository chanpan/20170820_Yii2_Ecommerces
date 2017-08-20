<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\places\models\Place */

$this->title = 'Place#'.$model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Places'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="place-view">

    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="itemModalLabel"><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="modal-body">
        <?= DetailView::widget([
	    'model' => $model,
	    'attributes' => [
		'id',
		'place_group_id',
		'name',
		'description:ntext',
		'facility',
		'subdistrict_id',
		'district_id',
		'province_id',
		'postal_code',
		'latitude',
		'longitude',
		'active',
		'created_at',
		'updated_at',
		'created_by',
		'updated_by',
	    ],
	]) ?>
    </div>
</div>
