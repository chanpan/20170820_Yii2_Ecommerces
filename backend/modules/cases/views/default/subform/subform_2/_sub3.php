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
        
        <div class="col-md-12">
            <div class="col-md-5">
                 <?php
                $label = 'ชื่อของผู้เสียชีวิต/บาดเจ็บ';
                $varName = 'var_form01_sub3_textarea_in2_width_x_height_sdsdf';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                ?>
                <?= EzformWidget::label($label) ?>
                <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
            </div>
            <div class="col-md-2">
                 <?php
                $label = 'อายุ(ปี)';
                $varName = 'var_form01_sub3_textarea_in2_age_sub3';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                ?>
                <?= EzformWidget::label($label) ?>
                <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
            </div>
            <div class="col-md-5">
                 <?php
                $label = 'แพทย์ผู้ชันสูตร';
                $varName = 'var_form01_sub3_textarea_in2sdfsdfsdfeee';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                ?>
                <?= EzformWidget::label($label) ?>
                <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
            </div>
        </div>
        <br>
        <div class="col-md-12" style="margin-top:20px;">
            <div class="form-group" id="headers">
                <?php
                $label = '';
                $varName = 'var_form01_sub2_drawing_map881';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                ?>
                <?= EzformWidget::label($label) ?>

                <?php
                echo appxq\sdii\widgets\SDDrawingv2::widget([
                    'id' => "881".$varName . '_' . $id_of_notify,
                    'name' => "Notify[content][$varName][value]",
                    'value' => $value,
                    'allow_bg' => true,
                    'options'=>[
                         
                        'bgUrl'=>Url::to('@web/drawing/bg/bgs/1.png'),
                        'outlineBg'=>Url::to('@web/drawing/bg/bgs/1.png'),
                        'height'=>'300',
                        'width'=>'1000'
                         
                    ]
                ]);
                ?>

                <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="form-group" id="body">
                <?php
                $label = '';
                $varName = 'var_form01_sub2_drawing_map882';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                ?>
                <?= EzformWidget::label($label) ?>

                <?php
                echo appxq\sdii\widgets\SDDrawingv2::widget([
                    'id' => "882".$varName . '_' . $id_of_notify,
                    'name' => "Notify[content][$varName][value]",
                    'value' => $value,
                    'allow_bg' => true,
                    'options'=>[
                        
                        'bgUrl'=>Url::to('@web/drawing/bg/bgs/2.png'),
                        'outlineBg'=>Url::to('@web/drawing/bg/bgs/2.png'),
                        'height'=>'550',
                        'width'=>'1000'
                         
                    ]
                ]);
                ?>

                <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="form-group" id="headers">
                <?php
                $label = '';
                $varName = 'var_form01_sub2_drawing_map883';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                ?>
                <?= EzformWidget::label($label) ?>

                <?php
                echo appxq\sdii\widgets\SDDrawingv2::widget([
                    'id' => "883".$varName . '_' . $id_of_notify,
                    'name' => "Notify[content][$varName][value]",
                    'value' => $value,
                    'allow_bg' => true,
                    'options'=>[
                        
                        'bgUrl'=>Url::to('@web/drawing/bg/bgs/3.png'),
                        'outlineBg'=>Url::to('@web/drawing/bg/bgs/3.png'),
                        'height'=>'300',
                        'width'=>'1000'
                         
                    ]
                ]);
                ?>

                <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
            </div>
        </div>
      
    </fieldset>
</div>
<?php 
$this->registerCss("
#headers .drawingContent {
    position: absolute;
    z-index: 900;
    top: 0px;
    left: -17px;
    height: 300px;
    background: #fff;
    overflow: hidden;
    width: 160px;
    overflow-y: scroll;
}    

")
?>
   