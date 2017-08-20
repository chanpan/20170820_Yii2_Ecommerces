<?php
use yii\helpers\Url;
use backend\modules\core\classes\CoreFunc;
use appxq\sdii\widgets\EzformWidget;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="modal-header" style="margin-bottom: 15px;">
    <h4 class="modal-title" >คดีเกี่ยวกับทรัพย์</h4>
</div>

<div class="form-group">
    <?php
    $label = 'text';
    $varName = 'var_text';
    $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
    ?>
    <?= EzformWidget::label($label)?>
    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
</div>

<div class="form-group">
    <?php
    $label = 'radioList';
    $varName = 'var_radio';
    $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;
    
    $items = [
        'data'=>CoreFunc::itemAlias('method_list'),
    ];
    ?>
    <?= EzformWidget::label($label)?>
    <?= EzformWidget::radioList("Notify[content][$varName][value]", $value, $items, ['inline'=>true])?>
    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
</div>

<div class="form-group">
    <?php
    $label = 'dropDownList';
    $varName = 'var_select';
    $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;
    ?>
    <?= EzformWidget::label($label)?>
    <?= EzformWidget::dropDownList("Notify[content][$varName][value]", $value, CoreFunc::itemAlias('autoload'), ['class'=>'form-control', 'prompt'=>'กรุณาเลือก'])?>
    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
</div>

<div class="form-group">
    <?php
    $label = 'radio other';
    $varName = 'var_radio_2';
    $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;
    
    $varNameOther = 'var_radio_other';
    $suffixOther = 'หน่วย';
    
    $items = [
        'data'=>[1=>'สินค้าอื่นๆ', 2=>'ปลา', 3=>'ของเล่น'],
        'other' => [
            3=>[
                'attribute'=>"Notify[content][$varNameOther][value]",
                'value'=>isset($data['content'][$varNameOther]['value'])?$data['content'][$varNameOther]['value']:'',
                'suffix'=>$suffixOther,
            ]
        ]
    ];
    
    ?>
    <?= EzformWidget::label($label)?>
    <?= EzformWidget::radioList("Notify[content][$varName][value]", $value, $items, ['inline'=>FALSE])?>
    
    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
    <?= EzformWidget::hiddenInput("Notify[content][$varNameOther][suffix]", $suffixOther)?>
</div>

<div class="form-group">
    <?php
    $label = 'check other';
    $varName = 'var_check_2';
    $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;
    
    $varNameOther = 'var_check_other';
    $suffixOther = 'หน่วย';
    
    $options = [
        'inline'=>FALSE,
        'label'=>$label,
        'other' => [
                'attribute'=>"Notify[content][$varNameOther][value]",
                'value'=>isset($data['content'][$varNameOther]['value'])?$data['content'][$varNameOther]['value']:'',
                'suffix'=>$suffixOther,
            ],
    ];
    
    ?>
    <?= EzformWidget::checkbox("Notify[content][$varName][value]", $value, $options)?>
    
    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
    <?= EzformWidget::hiddenInput("Notify[content][$varNameOther][suffix]", $suffixOther)?>
</div>

<div class="form-group">
    <?php
    $label = 'text editor';
    $varName = 'var_text_editor';
    $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
    ?>
    <?= EzformWidget::label($label)?>

    <?php echo \vova07\imperavi\Widget::widget([
          'id'=>'var_text_editor-1',
            'name'=>"Notify[content][$varName][value]",
            'value'=>$value,
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
    
    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
</div>

<div class="form-group">
    <?php
    $label = 'drawing';
    $varName = 'var_drawing_1_';
    $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
    ?>
    <?= EzformWidget::label($label)?>

    <?php
    // echo appxq\sdii\widgets\SDDrawingv2::widget([
    //     'id'=>$varName.'_'.$id_of_notify,
    //     'name'=>"Notify[content][$varName][value]",
    //     'value'=>$value,
    //     'allow_bg'=>true,
    // ]);
   ?>
    
    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
</div>
