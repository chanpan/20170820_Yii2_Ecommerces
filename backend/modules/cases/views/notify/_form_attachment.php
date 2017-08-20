<?php 
use \yii\web\JsExpression;
?>
<br>
<div >
	   <?= $form->field($model, 'files')->widget(\trntv\filekit\widget\Upload::classname(), [
							'url'=>['attachments-upload'],
              'multiple'=>true,
               'maxFileSize' => 10 * 1024 * 1024,
							'id'=>'wnotify-attachments',
              'maxNumberOfFiles' => 100
						]) ?>
</div>
