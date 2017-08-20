<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\modules\items\models\Item */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin([
	'id'=>$model->formName(),
    ]); ?>

    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="itemModalLabel">Item</h4>
    </div>

    <div class="modal-body">
	<div class="row">
            <?php
            $taxonomy = backend\modules\core\classes\CoreFunc::getTaxonomyDropDownList(0, 'item_group');
            ?>
                <div class="col-md-4 "><?= $form->field($model, 'item_group_id')->dropDownList($taxonomy, ['encode' => false, 'prompt' => 'none', 'data-id'=>$model->id]) ?></div>
                <div class="col-md-8 sdbox-col"><?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?></div>
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

        <div id="ident_form">
        <?php
        if(isset($model_ident)){
            if(isset($model_ident['identification1_name']) && $model_ident['identification1_name']!=''){
                echo $form->field($model, 'identification1')->textInput(['maxlength' => true])->label($model_ident['identification1_name']);
            } else {
                Html::activeHiddenInput($model, 'identification1');
            }
            if(isset($model_ident['identification2_name']) && $model_ident['identification2_name']!=''){
                echo $form->field($model, 'identification2')->textInput(['maxlength' => true])->label($model_ident['identification2_name']);
            } else {
                Html::activeHiddenInput($model, 'identification2');
            }
            if(isset($model_ident['identification3_name']) && $model_ident['identification3_name']!=''){
                echo $form->field($model, 'identification3')->textInput(['maxlength' => true])->label($model_ident['identification3_name']);
            } else {
                Html::activeHiddenInput($model, 'identification3');
            }
            if(isset($model_ident['identification4_name']) && $model_ident['identification4_name']!=''){
                echo $form->field($model, 'identification4')->textInput(['maxlength' => true])->label($model_ident['identification4_name']);
            } else {
                Html::activeHiddenInput($model, 'identification4');
            }
            if(isset($model_ident['identification5_name']) && $model_ident['identification5_name']!=''){
                echo $form->field($model, 'identification5')->textInput(['maxlength' => true])->label($model_ident['identification5_name']);
            } else {
                Html::activeHiddenInput($model, 'identification5');
            }
        }
        ?>
            </div>
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

<?php  $this->registerJs("
$('#item-item_group_id').on('change', function() {
    genFormItem($(this).val(), $(this).attr('data-id'));
});

function genFormItem(term_id, id) {
    $('#ident_form').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
$.ajax({
	    method: 'POST',
	    url:'".Url::to(['/items/item/get-form'])."',
	    data: {term:term_id, id:id},
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    $('#ident_form').html(result.html);
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
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
		//$(\$form).trigger('reset');
                $(document).find('#modal-item').modal('hide');
		$.pjax.reload({container:'#item-grid-pjax'});
	    } else if(result.action == 'update') {
		$(document).find('#modal-item').modal('hide');
		$.pjax.reload({container:'#item-grid-pjax'});
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