<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\modules\places\models\Place */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="place-form">

    <?php $form = ActiveForm::begin([
	'id'=>$model->formName(),
    ]); ?>

    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="itemModalLabel">Place</h4>
    </div>

    <div class="modal-body">
        <div class="row">
            <?php
            $taxonomy = backend\modules\core\classes\CoreFunc::getTaxonomyDropDownList(0, 'place_group');
            $dataItemsType = \backend\modules\cases\classes\CaseQuery::getCaseItemsType('place');
            ?>
                <div class="col-md-3 "><?= $form->field($model, 'case_items_type_id')->dropDownList(\yii\helpers\ArrayHelper::map($dataItemsType, 'id', 'name')) ?></div>
                <div class="col-md-3 sdbox-col"><?= $form->field($model, 'place_group_id')->dropDownList($taxonomy, ['encode' => false, 'prompt' => 'none']) ?></div>
                <div class="col-md-6 sdbox-col"><?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?></div>
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
        
	<?= $form->field($model, 'facility')->textInput(['maxlength' => true]) ?>
        
        <?php echo $form->field($model, 'province_id')->widget(appxq\sdii\widgets\SDProvincev2::className(), [
            'fields' => [
                    ['label'=>'province', 'attribute'=>'province_id'],
                    ['label'=>'amphur', 'attribute'=>'district_id'],
                    ['label'=>'tumbon', 'attribute'=>'subdistrict_id'],
                ],
            'enable_tumbon'=>true
        ])->label('จังหวัด อำเภอ ตำบล');?>
        
        <div class="row">
                <div class="col-md-4 "><?= $form->field($model, 'postal_code')->textInput(['maxlength' => true]) ?></div>
        </div>
	

        <?php
            $inputLatID = Html::getInputId($model, 'latitude');
	    $inputLngID = Html::getInputId($model, 'longitude');
	    $inputLatValue = Html::getAttributeValue($model, 'latitude');
	    $inputLngValue = Html::getAttributeValue($model, 'longitude');

        echo \appxq\sdii\widgets\MapInput::widget([
	    'lat'=>$inputLatID,
	    'lng'=>$inputLngID,
	    'latValue'=>$inputLatValue,
	    'lngValue'=>$inputLngValue,
            'registerJs'=>false
	]);
                
        ?>
	<?= $form->field($model, 'active')->checkbox() ?>
        <?= $form->field($model, 'latitude')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'longitude')->hiddenInput()->label(false) ?>
        
        <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>
         <?= Html::activeHiddenInput($model, 'case_id') ?>
        
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
$js = "if(result.action == 'create') {
		//$(\$form).trigger('reset');
                $(document).find('#modal-items').modal('hide');
		$.pjax.reload({container:'#cases-grid-pjax'});
	    } else if(result.action == 'update') {
		$(document).find('#modal-items').modal('hide');
		$.pjax.reload({container:'#cases-grid-pjax'});
	    }";
if($view_load){
    $js = "if(result.action == 'create') {
		placeUi();
                $(document).find('#modal-items').modal('hide');
	    } else if(result.action == 'update') {
                placeUi();
		$(document).find('#modal-items').modal('hide');
	    }";
}

$this->registerJs("
$('form#{$model->formName()}').on('beforeSubmit', function(e) {
    var \$form = $(this);
    $.post(
	\$form.attr('action'), //serialize Yii2 form
	\$form.serialize()
    ).done(function(result) {
	if(result.status == 'success') {
	    ". SDNoty::show('result.message', 'result.status') ."
	    $js
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