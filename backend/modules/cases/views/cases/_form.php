<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;
use backend\modules\cases\classes\CaseQuery;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model backend\modules\cases\models\Cases */
/* @var $form yii\bootstrap\ActiveForm */

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
	<div class="row">
                <div class="col-md-8 "><?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?></div>
                <div class="col-md-4 sdbox-col"><?= $form->field($model, 'case_type_id')->dropDownList(ArrayHelper::map(CaseQuery::getCaseType(), 'id', 'name')) ?></div>
        </div>

        <?php echo $form->field($model, 'description')->widget(vova07\imperavi\Widget::className(), [
                'settings' => [
                        'lang' => 'th',
                        'minHeight' => 30,
                        'imageManagerJson' => Url::to(['/cases/upload/images-get']),
                        'fileManagerJson' => Url::to(['/cases/upload/files-get']),
                        'imageUpload' => Url::to(['/cases/upload/image-upload']),
                        'fileUpload' => Url::to(['/cases/upload/file-upload']),
                        'plugins' => [
                            'fontcolor',
                            'fontfamily',
                            'fontsize',
                            'textdirection',
                            'textexpander',
                            'counter',
                            'table',
                            'definedlinks',
                            'video',
                            'imagemanager',
                            'filemanager',
                            'limiter',
                            'fullscreen',
                        ]
                    ]
            ]);?>
        <div class="row">
            <div class="col-md-6 ">
                <?= $form->field($model, 'occurred_at')->widget(\trntv\yii\datetimepicker\DatetimepickerWidget::className(), [
           
            'phpDatetimeFormat' => 'dd/MM/yyyy HH:mm',
            'momentDatetimeFormat' => 'DD/MM/YYYY HH:mm',
            'clientOptions' => [
                'format' => 'DD/MM/YYYY HH:mm',
                'sideBySide' => true,
                'locale' => 'th',
            ],
        ]) ?>
            </div>
            <div class="col-md-6 sdbox-col">
                <?php 
        $caseName = empty($model->report_of) ? '' : backend\modules\cases\models\Cases::findOne($model->report_of)->name;
        ?>
        <?= $form->field($model, 'report_of')->widget(\kartik\select2\Select2::className(), [
            'initValueText' => $caseName,
            'options' => ['placeholder' => 'case','id'=>'report_of_case'],
            'pluginOptions' => [
                'allowClear' => true,
                'minimumInputLength' => 0,
                'ajax' => [
                    'url' => Url::to(['/cases/cases/get-case', 'caseid'=>$model->id]),
                    'dataType' => 'json',
                    'data' => new JsExpression('function(params) { return {q:params.term}; }')
                ],
                 'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                 'templateResult' => new JsExpression('function(result) { return result.text; }'),
                 'templateSelection' => new JsExpression('function (result) { return result.text; }'),
                ],
            ]) ?>
            </div>
        </div>
	
        <div id="person_box"></div>
        
        <div id="place_box"></div>
        
        <div id="item_box"></div>
        
        
	<?= $form->field($model, 'active')->checkbox() ?>
        
        <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>
	    <?= Html::activeHiddenInput($model, 'updated_at') ?>
        <?= Html::activeHiddenInput($model, 'updated_by') ?>
        <?= Html::activeHiddenInput($model, 'created_at') ?>
        <?= Html::activeHiddenInput($model, 'created_by') ?>

    </div>
    <div class="modal-footer">
	<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php  

$js = '';
if(!$model->isNewRecord){
    $js = "
        placeUi();
        itemUi();
        personUi();
    ";
}

$this->registerJs("
$js
    
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

");?>