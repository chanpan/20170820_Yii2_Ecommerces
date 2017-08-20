<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;
use backend\modules\cases\classes\CaseQuery;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model backend\modules\cases\models\Cases */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $this yii\web\View */
/* @var $model backend\modules\cases\models\Cases */
?>

<div class="cases-form">

    <?php $form = ActiveForm::begin([
	'id'=>$model->formName(),
    ]); ?>

    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="itemModalLabel">Cases</h4>
    </div>

    <div class="modal-body">
	
		<?=Tabs::widget([
			'id'=>'tabsNotify',
			'items' => [
				[
					'label' => 'รายละเอียดรับแจ้งเหตุ',
					'content' => $this->render('_notify_form', ['notifyModel'=>$notifyModel]),
					'active' => true
				],
				[
					'label' => 'คน',
					'content' => '<div id="person_box">Loading.....</div>'
				],
				[
					'label' => 'วัตถุพยาน',
					'content' => '<div id="item_box">Loading.....</div>'
				],
				[
					'label' => 'สถานที่',
					'content' => '<div id="place_box">Loading.....</div>'
				],
			],
		]);?>

        <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>

	    <?= Html::activeHiddenInput($model, 'updated_at') ?>
        <?= Html::activeHiddenInput($model, 'updated_by') ?>
        <?= Html::activeHiddenInput($model, 'created_at') ?>
        <?= Html::activeHiddenInput($model, 'created_by') ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?=  ModalForm::widget([
    'id' => 'modal-cases',
    'size'=>'modal-xxl',
    'tabindexEnable'=>false,
]);
?>



<?php  

$this->registerJs("
placeUi();
itemUi();
personUi();

function placeUi(){
    $.ajax({
	    method: 'POST',
	    url:'".Url::to(['/places/place/get-table', 'case'=>$model->id])."',
	    dataType: 'HTML',
	    success: function(result, textStatus) {
		$('#place_box').html(result);
	    }
    });
}

function itemUi(){
    $.ajax({
	    method: 'POST',
	    url:'".Url::to(['/items/item/get-table', 'case'=>$model->id])."',
	    dataType: 'HTML',
	    success: function(result, textStatus) {
		$('#item_box').html(result);
	    }
    });
}

function personUi(){
    $.ajax({
	    method: 'POST',
	    url:'".Url::to(['/persons/person/get-table', 'case'=>$model->id])."',
	    dataType: 'HTML',
	    success: function(result, textStatus) {
		$('#person_box').html(result);
	    }
    });
}

$('form#{$model->formName()}').on('beforeSubmit', function(e) {
    var \$form = $(this);
    $.post(
	\$form.attr('action'), //serialize Yii2 form
	\$form.serialize()
    ).done(function(result) {
	if(result.status == 'success') {
	    ". SDNoty::show('result.message', 'result.status') ."
	    if(result.action == 'create') {
		$(document).find('#modal-cases').modal('hide');
		$.pjax.reload({container:'#cases-grid-pjax'});
	    } else if(result.action == 'update') {
		$(document).find('#modal-cases').modal('hide');
		$.pjax.reload({container:'#cases-grid-pjax'});
	    }
	} else {
	    ". SDNoty::show('result.message', 'result.status') ."
	} 
    }).fail(function() {
	". SDNoty::show("'" . SDHtml::getMsgError() . "Server Error'", '"error"') ."
	console.log('server error');
    });
    return false;
});

function modalCase(url) {
    $('#modal-cases .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-cases').modal('show')
    .find('.modal-content')
    .load(url);
}

function modalItems(url) {
    $('#modal-items .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-items').modal('show')
    .find('.modal-content')
    .load(url);
}
");?>
