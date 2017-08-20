<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\cases\models\Notify */

$this->title = 'รับแจ้งเหตุ #'.$model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Notifies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notify-view">

    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="itemModalLabel"><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="modal-body">
        <?= DetailView::widget([
	    'model' => $model,
	    'attributes' => [
		//'id',
		'notify_choice',
		'notify_no',
		'write_at',
		'notify_date:dateTime',
		'notify_from',
		'notify_from_type',
		'caseTypeName',
		'case_type_other',
		'location_text:html',
		'sdate',
		'stime',
		'edate',
		'etime',
		'time_total',
		'desc:html',
		'emp_name',
		'emp_tel',
		'sufferer_name',
		'sufferer_tel',
		'status:boolean',
		'created_by',
		'created_at:dateTime',
		'updated_by',
		'updated_at:dateTime',
	    ],
	]) ?>
    </div>
</div>
