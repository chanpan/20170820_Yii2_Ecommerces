<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;
use  trntv\filekit\widget\UploadAsset;
use  trntv\filekit\widget\BlueimpFileuploadAsset;
use  trntv\filekit\widget\BlueimpTmplAsset;
use  trntv\filekit\widget\BlueimpCanvasToBlobAsset;
use  trntv\filekit\widget\BlueimpLoadImageAsset;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\persons\models\PersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Persons';
$this->params['breadcrumbs'][] = $this->title;
$dataGroup = backend\modules\core\classes\CoreFunc::getTaxonomyDropDownList(0, 'person_group');
$gender = \backend\modules\persons\models\Gender::find()->select(['name'])->indexBy('id')->orderBy('name ASC')->column();
?>
<div class="person-index">

    <div class="sdbox-header">
    <h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p style="padding-top: 10px;">

    <?php  Pjax::begin(['id'=>'person-grid-pjax']);?>
    <?= GridView::widget([
    'id' => 'person-grid',
    'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['person/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-person']). ' ' .
              Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['person/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-person', 'disabled'=>true]),
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
        'columns' => [
        [
        'class' => 'yii\grid\CheckboxColumn',
        'checkboxOptions' => [
            'class' => 'selectionPersonIds'
        ],
        'headerOptions' => ['style'=>'text-align: center;'],
        'contentOptions' => ['style'=>'width:40px;text-align: center;'],
        ],
        [
        'class' => 'yii\grid\SerialColumn',
        'headerOptions' => ['style'=>'text-align: center;'],
        'contentOptions' => ['style'=>'width:60px;text-align: center;'],
        ],
        [
            'attribute'=>'person_group_id',
            'value'=>function ($data){ 
                $data_taxonomy = \backend\modules\core\classes\CoreQuery::getTaxonomyById($data->person_group_id);
                if($data_taxonomy){
                    return $data_taxonomy['name'];
                }
                return '';
            },
            'label'=>'กลุ่ม',
            'contentOptions'=>['style'=>'width:180px;'],     
            'filter'=> Html::activeDropDownList($searchModel, 'person_group_id', $dataGroup, ['encode' => false, 'class'=>'form-control', 'prompt'=>'All']),        
        ],
          'fullNameTH',
            // 'image_id',
            'id_number',
          [
            'attribute'=>'gender_id',
            'filter'=>$gender,
            'value'=>'genderText'
          ],
            // 'id_card_issue_date',
            // 'id_card_issue_at',
            // 'id_card_expiry_date',
            // 'passport_number',
            // 'th_title_name',
            // 'th_first_name',
            // 'th_middle_name',
            // 'th_last_name',
            // 'th_nickname',
            // 'en_title_name',
            // 'en_first_name',
            // 'en_middle_name',
            // 'en_last_name',
            // 'en_nickname',
            // 'raceId',
            // 'nationality_id',
            // 'blood_type_id',
            // 'religion_id',
            // 'gender_id',
            // 'military_status_id',
            // 'marriage_status_id',
            // 'birthdate',
            // 'occupation',
            // 'address:ntext',
            // 'subdistrictId',
            // 'districtId',
            // 'province_id',
            // 'country_id',
            // 'postal_code',
            // 'phone_number',
            // 'mobile_number',
            // 'work_number',
            // 'fax_number',
            // 'other_number',
            // 'email:email',
            // 'facebook',
            // 'twitter',
            // 'line',
            // 'note:ntext',
            // 'active',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',
            [
                    'attribute'=>'updated_at',
                    'value'=>function ($data) {
                        return \appxq\sdii\utils\SDdate::mysql2phpThDateSmall($data['updated_at']);
                    },
                    'headerOptions'=>['style'=>'text-align: center;'],
                    'contentOptions'=>['style'=>'width:100px;text-align: center;'],
                    'filter'=>'',
            ],
        [
        'class' => 'appxq\sdii\widgets\ActionColumn',
        'contentOptions' => ['style'=>'width:80px;text-align: center;'],
        'template' => '{view} {update} {delete}',
        ],
        ],
    ]); ?>
    <?php  Pjax::end();?>

</div>

<?=  ModalForm::widget([
    'id' => 'modal-person',
    'size'=>'modal-xxl',
    'options'=>[
        'tabindex' => false
    ]
]);
?>

<?php  
$this->registerJs("
$('#person-grid-pjax').on('click', '#modal-addbtn-person', function() {
    modalPerson($(this).attr('data-url'));
});

$('#person-grid-pjax').on('click', '#modal-delbtn-person', function() {
    selectionPersonGrid($(this).attr('data-url'));
});

$('#person-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#person-grid').yiiGridView('getSelectedRows');
	disabledPersonBtn(key.length);
    },100);
});

$('#person-grid-pjax').on('click', '.selectionPersonIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledPersonBtn(key.length);
});

$('#person-grid-pjax').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalPerson('".Url::to(['person/update', 'id'=>''])."'+id);
});	

$('#person-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalPerson(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#person-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }).fail(function() {
		". SDNoty::show("'" . SDHtml::getMsgError() . "Server Error'", '"error"') ."
		console.log('server error');
	    });
	});
    }
    return false;
});

function disabledPersonBtn(num) {
    if(num>0) {
	$('#modal-delbtn-person').attr('disabled', false);
    } else {
	$('#modal-delbtn-person').attr('disabled', true);
    }
}

function selectionPersonGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionPersonIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#person-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalPerson(url) {
    $('#modal-person .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-person').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>