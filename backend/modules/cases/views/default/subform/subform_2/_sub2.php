<?php
use yii\helpers\Url;
use backend\modules\core\classes\CoreFunc;
use appxq\sdii\widgets\EzformWidget;

use yii\helpers\Html;
 
use yii\bootstrap\ActiveForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;
use yii\bootstrap\Tabs;
use kartik\widgets\DatePicker;
use kartik\widgets\DateTimePicker;
 
use kartik\widgets\TimePicker;
?>
 
<div class="row" style="margin-top:10px;">
    <fieldset>
        
        <div class="col-md-12" >
            <div class="form-group">
                <?php
                $label = 'แผนผังสังเขป';
                $varName = 'var_form02_sub2_drawing_map500';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                ?>
                <?= EzformWidget::label($label) ?>

                <?php
                echo appxq\sdii\widgets\SDDrawingv2::widget([
                    'id' => $varName . '_' . $id_of_notify,
                    'name' => "Notify[content][$varName][value]",
                    'value' => $value,
                    'allow_bg' => true,
                    'options'=>[
                        'bgUrl'=> Url::to('@web/drawing/bg/bgs/4.png'),
                        
                         
                    ]
                ]);
                ?>

                <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="form-group">
                <?php
                $label = 'หมายเหตุ';
                $varName = 'var_form02_sub2_editor_note501';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                ?>
                <?= EzformWidget::label($label) ?>

                <?php
                echo \vova07\imperavi\Widget::widget([
                    'name' => "Notify[content][$varName][value]",
                    'value' => $value,
                    'id' => 'var_text_editor2',
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
                ]);
                ?>

        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
            </div>
        </div>
    </fieldset>
</div>