 <?php 
  // $model = backend\modules\cases\models\Notify::findOne($model);
  //\appxq\sdii\utils\VarDumper::dump($model);
 ?>
<div style="padding:20px;">
    <div class="row">
        <div class="col-md-8"><?= $form->field($model, 'case_type_id')->dropdownList(\backend\modules\cases\models\caseType::find()->IndexBy('id')->select('name')->column()) ?></div>
        <div class="col-md-4"><?= $form->field($model, 'case_type_other')->textInput(['maxlength' => true]) ?></div>
    </div>
    <hr>
    <div id="form-content"></div>
</div>

<?php $this->registerJs("
var url = '" . yii\helpers\Url::to(['/cases/default/get-form', 'id_of_notify' => $model->id, 'data' => base64_encode($model->id), 'type' => '']) . "'+$('#notify-case_type_id').val();
getForm(url);

$('#notify-case_type_id').on('change', function(){
    var url = '" . yii\helpers\Url::to(['/cases/default/get-form', 'id_of_notify' => $model->id, 'data' => base64_encode($model->id), 'type' => '']) . "'+$(this).val();
    getForm(url);
});

function getForm(url) {
    $.ajax({
	    method: 'POST',
	    url:url,
	    dataType: 'HTML',
	    success: function(result, textStatus) {
		$('#form-content').html(result);
	    }
    });
}
"); ?>