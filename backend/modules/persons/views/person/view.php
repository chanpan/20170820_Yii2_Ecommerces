<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\persons\models\Person */

$this->title = 'Person #'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'People', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-view">

    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="itemModalLabel"><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="modal-body">
        <?= DetailView::widget([
		'template' => '<tr><th{captionOptions} style="width:200px;">{label}</th><td{contentOptions}>{value}</td></tr>',
	    'model' => $model,
	    'attributes' => [
		// 'person_group_id',
		// 'image_id',
		'id_number',
		'id_card_issue_date:date',
		'id_card_issue_at',
		'id_card_expiry_date:date',
		'passport_number',
		'th_nickname',
		'fullNameTH',
		// 'th_title_name',
		// 'th_first_name',
		// 'th_middle_name',
		// 'th_last_name',
		'en_nickname',
		'fullNameEN',
		// 'en_title_name',
		// 'en_first_name',
		// 'en_middle_name',
		// 'en_last_name',
		'raceText',
		'nationalityText',
		'bloodTypeText',
		'religionText',
		'genderText',
		'militaryStatusText',
		'marriageStatusText',
		'birthdate:date',
		'occupation',
		'address:ntext',
		'subdistrictText',
		'districtText',
		'provinceText',
		'countryText',
		'postal_code',
		'phone_number',
		'mobile_number',
		'work_number',
		'fax_number',
		'other_number',
		'email:email',
		'facebook',
		'twitter',
		'line',
		'note:ntext',
		'active:boolean',
		'created_at:dateTime',
		'updated_at:dateTime',
		'createdByName',
		'updatedByName',
	    ],
	]) ?>
    </div>
</div>
