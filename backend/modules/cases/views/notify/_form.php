<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;
use yii\bootstrap\Tabs;
/* @var $this yii\web\View */
/* @var $model backend\modules\cases\models\Notify */
/* @var $form yii\bootstrap\ActiveForm */
//appxq\sdii\utils\VarDumper::dump($model);
?>

<div class="notify-form">
    <?php $form = ActiveForm::begin([
	'id'=>$model->formName(),
    ]); ?>
    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="itemModalLabel"> ลงทะเบียนรับแจ้งเหตุ </h4>
    </div>
    <div class="modal-body">
	<?=Tabs::widget([
			'id'=>'tabsNotifyForm',
			'items' => [
				[
					'label' => 'รายละเอียดรับแจ้งเหตุ',
					'content' =>$this->render('_form_items', ['model'=>$model,'form'=> $form]),
					 
					'active' => true
				],
				[
						'label' => 'ประเภทเหตุที่รับแจ้ง',
						'content' => $this->render('_form_case_type', ['model'=>$model,'form'=> $form]),
						'options' => ['id' => 'tab-person'],
				],
				[
						'label' => 'ภาพถ่าย',
						//'content' => $this->render('_form_attachment', ['model'=>$model->id,'form'=> $form]),
						//'content' => $this->render('_form_attachment', ['model'=>$model,'form'=> $form]),
						'coptions' => ['id' => 'tab-attachment'],
				],
			],
		]);?>
		<?php ?>
    </div>
    <div class="modal-footer">
	<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php  


$this->registerJs("
$('form#{$model->formName()}').on('beforeSubmit', function(e) {
    var \$form = $(this);
    $.post(
	\$form.attr('action'), //serialize Yii2 form
	\$form.serialize()
    ).done(function(result) {
       // console.log(result);return false;
	if(result.status == 'success') {
	    ". SDNoty::show('result.message', 'result.status') ."
	    if(result.action == 'create') {
		//$(\$form).trigger('reset');
                $(document).find('#modal-notify').modal('hide');
		$.pjax.reload({container:'#notify-grid-pjax'});
	    } else if(result.action == 'update') {
		$(document).find('#modal-notify').modal('hide');
		$.pjax.reload({container:'#notify-grid-pjax'});
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

");?>

