<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\addr\models\AddrSubdistrict */

$this->title = 'Addr Subdistrict#'.$model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Addr Subdistricts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="addr-subdistrict-view">

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
		'districtId',
	    ],
	]) ?>
    </div>
</div>
