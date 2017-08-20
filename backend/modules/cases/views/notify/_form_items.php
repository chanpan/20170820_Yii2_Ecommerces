<?php

use yii\helpers\Html;
use yii\helpers\Url;
//$model = backend\modules\cases\models\Notify::findOne($model);

 //appxq\sdii\utils\VarDumper::dump($form);
?>
<div style="padding:20px;">
	

  <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>
	<div class="row">
		<div class="col-md-2"><?= $form->field($model, 'notify_choice')->textInput(['maxlength' => true]) ?></div>
		<div class="col-md-2"><?= $form->field($model, 'notify_no')->textInput(['maxlength' => true]) ?></div>
		<div class="col-md-5"><?= $form->field($model, 'write_at')->textInput(['maxlength' => true]) ?></div>
		<div class="col-md-3">	
			<?= $form->field($model, 'notify_date')->widget(\kartik\widgets\DatePicker::classname(), [
				'options' => ['placeholder' => 'เมื่อวันที่ ...'],
				'language'=>'th',
				'pluginOptions' => [
					'autoclose'=>true,
					'format' => 'yyyy-mm-dd'
				]
			]);?>
		</div>
	</div>
	
	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

	<div class="row">
		<div class="col-md-8"><?= $form->field($model, 'notify_from')->textInput(['maxlength' => true]) ?></div>
		<div class="col-md-4">	<?= $form->field($model, 'notify_from_type')->inline()->radioList(\backend\modules\core\classes\CoreFunc::itemAlias('notify_from_type')) ?></div>
	</div>

	<div class="row">
		<div class="col-md-12"><?php // $form->field($model, 'case_type_id')->inline()->radioList(\backend\modules\cases\models\CaseType::find()->IndexBy('id')->select('name')->column()) ?></div>
		<div class="col-md-4"><?php //$form->field($model, 'case_type_other')->textInput(['maxlength' => true]) ?></div>
</div>

	        <?= $form->field($model, 'location_text')->widget(vova07\imperavi\Widget::className(), [
                'settings' => [
                        'lang' => 'th',
                        'minHeight' => 30,
                        'imageManagerJson' => Url::to(['/notify/upload/images-get']),
                        'fileManagerJson' => Url::to(['/notify/upload/files-get']),
                        'imageUpload' => Url::to(['/notify/upload/image-upload']),
                        'fileUpload' => Url::to(['/notify/upload/file-upload']),
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
	<div class="col-md-3">
		<?= $form->field($model, 'sdate')->widget(\kartik\widgets\DatePicker::classname(), [
			'options' => ['placeholder' => 'วันที่เกิดเหตุ ...'],
			'language'=>'th',
			'pluginOptions' => [
				'autoclose'=> true,
				'format' => 'yyyy-mm-dd'
			]
		]);?>
	</div>
	<div class="col-md-3">
		<?= $form->field($model, 'stime')->widget(\kartik\widgets\TimePicker::classname(),[
			'pluginOptions' => [
				'showSeconds' => false,
				'showMeridian' => false,
				'minuteStep' => 5,
			]
		]) ?>
	</div>
	<div class="col-md-3">
		<?= $form->field($model, 'edate')->widget(\kartik\widgets\DatePicker::classname(), [
			'options' => ['placeholder' => 'วันที่ถึงที่เกิดเหตุ ...'],
			'language'=>'th',
			'pluginOptions' => [
				'autoclose'=>true,
				'format' => 'yyyy-mm-dd'
			]
		]);?>	
	</div>
	<div class="col-md-3">
		<?= $form->field($model, 'etime')->widget(\kartik\widgets\TimePicker::classname(),[
			'pluginOptions' => [
				'showSeconds' => false,
				'showMeridian' => false,
				'minuteStep' => 5,
			]
		]) ?>	
	</div>
</div>

	<?= $form->field($model, 'time_total')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'desc')->widget(vova07\imperavi\Widget::className(), [
	'settings' => [
		'lang' => 'th',
		'minHeight' => 30,
		'imageManagerJson' => Url::to(['/notify/upload/images-get']),
		'fileManagerJson' => Url::to(['/notify/upload/files-get']),
		'imageUpload' => Url::to(['/notify/upload/image-upload']),
		'fileUpload' => Url::to(['/notify/upload/file-upload']),
		'plugins' => [
			'fontcolor',
			'fontfamily',
			'fontsize',
			// 'textdirection',
			// 'textexpander',
			// 'counter',
			// 'table',
			// 'definedlinks',
			// 'video',
			// 'imagemanager',
			// 'filemanager',
			// 'limiter',
			// 'fullscreen',
		]
	]
	]);?>
<div class="row">
	<div class="col-md-6"><?= $form->field($model, 'emp_name')->textInput(['maxlength' => true]) ?></div>
	<div class="col-md-6"><?= $form->field($model, 'emp_tel')->textInput(['maxlength' => true]) ?></div>
</div>
	<div class="row">
		<div class="col-md-6"><?= $form->field($model, 'sufferer_name')->textInput(['maxlength' => true]) ?></div>
		<div class="col-md-6">	<?= $form->field($model, 'sufferer_tel')->textInput(['maxlength' => true]) ?></div>
	</div>
	<?= $form->field($model, 'status')->inline()->radioList(['1'=>'เปิด','0'=>'ปิด']) ?>

	</div>