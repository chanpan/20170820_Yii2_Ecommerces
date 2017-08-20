<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<?php $form = ActiveForm::begin([
	'id'=>'test_form',
    ]); ?>

<div class="form-group">
    <label>Type</label>
    <?= yii\helpers\Html::dropDownList('notify_type', null,['111','2222', '3333'], ['id'=>'notify_type', 'class'=>'form-control'])?>
    <?= Html::hiddenInput('id', $id_of_notify )?>
</div>

<div id="form-content" >
    <?php
    echo \vova07\imperavi\Widget::widget([
    'name' => 'redactor_test',
]);
    ?>
    <?php
    echo appxq\sdii\widgets\SDDrawingv2::widget([
        'name'=>"drawing_test",
    ]);
   ?>
</div>

<div class="modal-footer">
	<?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
	<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); 

if(isset($notify)){
    appxq\sdii\utils\VarDumper::dump($notify,0);
}

?>

<?php
$this->registerJs("
var url = '".yii\helpers\Url::to(['/cases/default/get-form', 'id_of_notify'=>$id_of_notify, 'data'=> base64_encode($data), 'type'=>''])."'+$('#notify_type').val();
getForm(url);

$('#notify_type').on('change', function(){
    var url = '".yii\helpers\Url::to(['/cases/default/get-form', 'id_of_notify'=>$id_of_notify, 'data'=> base64_encode($data), 'type'=>''])."'+$(this).val();
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
");?>