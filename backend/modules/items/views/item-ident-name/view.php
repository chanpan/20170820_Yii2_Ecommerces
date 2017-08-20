<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\ItemIdentName */

$this->title = 'Item Ident Name#'.$model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item Ident Names'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-ident-name-view">

    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="itemModalLabel"><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="modal-body">
        <?= DetailView::widget([
	    'model' => $model,
	    'attributes' => [
		'id',
		'term_taxonomy_id',
		'identification1_name',
		'identification2_name',
		'identification3_name',
		'identification4_name',
		'identification5_name',
	    ],
	]) ?>
    </div>
</div>
