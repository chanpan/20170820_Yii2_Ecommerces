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

<br>
<div class="row">
 
 
    <fieldset>
        <legend>1.การรับแจ้งเหตุ</legend>
    <div class="col-md-7">
        <?php
        $label = 'คดี';
        $varName = 'var_case_type';
        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
        $items = [
            'data' => CoreFunc::itemAlias('asset_case_type'),
            'other' => [
                4 => [
                    'attribute' => "Notify[content][$varNameOther][value]",
                    'value' => isset($data['content'][$varNameOther]['value']) ? $data['content'][$varNameOther]['value'] : '',
                    'suffix' => $suffixOther,
                ]
            ]
        ];
        ?>
        <?= EzformWidget::label($label) ?>
        <?= EzformWidget::radioList("Notify[content][$varName][value]", $value, $items, ['inline' => true]) ?>
        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
    </div>
    <div class="col-md-4">
        <?php $label = 'วันที่';?>
        <label><?= $label; ?></label>
        <?php 
            $varName = '_form1_sub_notification_01_date1';
            $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
            echo DatePicker::widget([
                'name' => "Notify[content][$varName][value]",
                //'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'value' => $value,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);
            
        ?>
        <!--<input type="text" class="form-control" name="Notify[content][_form1_sub_notification_01_date1][value]" value="<?= $value;?>">-->
    </div><div class="clearfix"></div><br>
    
    <div class="col-md-12">
        <?php
        $label = 'การรับแจ้ง';
        $varName = '_form1_sub_notification_01';
        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
        $items = [
            'data' => CoreFunc::itemAlias('_form1_sub_notification_01'),
            'other' => [
                5 => [
                    'attribute' => "Notify[content][$varNameOther][value]",
                    'value' => isset($data['content'][$varNameOther]['value']) ? $data['content'][$varNameOther]['value'] : '',
                    'suffix' => $suffixOther,
                ]
            ]
        ];
        ?>
        <?= EzformWidget::label($label) ?>
        <?= EzformWidget::radioList("Notify[content][$varName][value]", $value, $items, ['inline' => true]) ?>
        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
    </div>
    <br>
    <div class="col-md-6">
        <div class="form-group">
                    <?php
                    $label = 'พนักงานสอบสวน';
                    $varName = '_form1_sub_notification_01_person';
                    $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
                    ?>
                    <?= EzformWidget::label($label)?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
            </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
                    <?php
                    $label = 'หมายเลขโทรศัพท์';
                    $varName = '_form1_sub_notification_01_phone';
                    $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
                    ?>
                    <?= EzformWidget::label($label)?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
            </div>
    </div>
    </fieldset>
</div>    
 
<div class="clearfix"></div> 
<br>
<div class="row">
     
    <fieldset>
        <legend>2.สถานที่เกิดเหตุ</legend>
        <div class="col-md-12">
            <div class="form-group">
                <?php
                $label = 'สถานที่เกิดเหตุ';
                $varName = '_form1_sub_notification_01_accident_location';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                ?>
                <?= EzformWidget::label($label) ?>
                <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control'], [
                    'rows' => 20])
                ?>
                <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
            </div>
        </div>
        <div class=""> 
            <div class="col-md-12">
                <div class="form-group">


                    <?php
                    $label = 'ผู้เสียหาย';
                    $varName = '_form1_sub_notification_01_sufferer';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                    $items = [
                        'data' => CoreFunc::itemAlias('_form1_sub_notification_01_sufferer'),
                        'other' => [
                            4 => [
                                'attribute' => "Notify[content][$varNameOther][value]",
                                'value' => isset($data['content'][$varNameOther]['value']) ? $data['content'][$varNameOther]['value'] : '',
                                'suffix' => $suffixOther,
                            ]
                        ]
                    ];
                    ?>
                    <?= EzformWidget::label($label) ?>
                    <?= EzformWidget::radioList("Notify[content][$varName][value]", $value, $items, ['inline' => true]) ?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                </div> 
            </div>

            <div class="col-md-8">
                <div class="form-group">
                    <?php
                    $label = 'ชื่อ';
                    $varName = '_form1_sub_notification_01_person_home_name';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                    ?>
                    <?= EzformWidget::label($label) ?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?php
                    $label = 'อายุประมาณ';
                    $varName = '_form1_sub_notification_01_person_home_year';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                    ?>
                    <?= EzformWidget::label($label) ?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                </div>
            </div>
        </div>
    </fieldset>     
</div>

<br>
<div class="row"> 
    
    <fieldset>
        <legend>3.วันเวลาที่พนักงานสอบสวน/ผู้เสียหาย ทราบสาเหตุ/เกิดเหตุ</legend>
    <div class="col-md-6">
        <?php $label = 'วันที่';?>
        <label><?= $label; ?></label>
        <?php 
            $varName = '_form1_sub_notification_01_date1';
            $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
            echo DatePicker::widget([
                'name' => "Notify[content][$varName][value]",
                //'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'value' => $value,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);
            
            
        ?>
        <!--<input type="text" class="form-control" name="Notify[content][_form1_sub_notification_01_date1][value]" value="<?= $value;?>">-->
    </div>
        <div class="col-md-6">
            <?php 
                $varName = 'var_form01_sub1_timepicker01';
                $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
                //echo $this->render("./template/timpicker.php",['varName'=>$varName,'value'=>$value]);
            ?>
        </div>
        
    </fieldset>
</div> 
<br>
<div class="row"> 
    
    <fieldset>
        <legend>4.วันเวลาที่ทำการตรวจสถานที่เกิดเหตุ</legend>
    <div class="col-md-6">
        <?php $label = 'วันที่';?>
        <label><?= $label; ?></label>
        <?php 
            $varName = '_form1_sub_notification_01_date2';
            $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
            echo DatePicker::widget([
                'name' => "Notify[content][$varName][value]",
                //'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'value' => $value,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);
            
        ?>
        <!--<input type="text" class="form-control" name="Notify[content][_form1_sub_notification_01_date1][value]" value="<?= $value;?>">-->
    </div>
        <div class="col-md-6"></div><div class="clearfix"></div>
        <div style="margin-left:15px;margin-top:10px;" class="margin-top"><?= EzformWidget::label('วันเวลาที่ทำการตรวจสถานที่เกิดเหตุเพิ่มเติม') ?></div>
        <div class="col-md-6">
            <?php $label = 'วันที่'; ?>
            <label><?= $label; ?></label>
            <?php
            $varName = '_form1_sub_notification_01_date3';
            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
            echo DatePicker::widget([
                'name' => "Notify[content][$varName][value]",
                //'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'value' => $value,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);
            ?>
            <!--<input type="text" class="form-control" name="Notify[content][_form1_sub_notification_01_date1][value]" value="<?= $value; ?>">-->
        </div>
    </fieldset>
</div>
 
<div class="clearfix"></div>
  <br>  
    <div class="row">
         
        <fieldset>
        <legend>5.ผู้ตรวจสอบสถานที่เกิดเหตุ</legend>
        <div class="col-md-6">
            <div class="form-group">
                    <?php
                    $label = '5.1';
                    $varName = 'var_check_1';
                    $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
                    ?>
                    <?= EzformWidget::label($label)?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
            </div>
            <div class="form-group">
                    <?php
                    $label = '5.2';
                    $varName = 'var_check_2';
                    $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
                    ?>
                    <?= EzformWidget::label($label)?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
            </div>
            <div class="form-group">
                    <?php
                    $label = '5.3';
                    $varName = 'var_check_3';
                    $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
                    ?>
                    <?= EzformWidget::label($label)?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
            </div>        
        </div>
        <div class="col-md-6">
            <div class="form-group">
                    <?php
                    $label = '5.4';
                    $varName = 'var_check_4';
                    $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
                    ?>
                    <?= EzformWidget::label($label)?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
            </div>
            <div class="form-group">
                    <?php
                    $label = '5.5';
                    $varName = 'var_check_5';
                    $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
                    ?>
                    <?= EzformWidget::label($label)?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
            </div>
            <div class="form-group">
                    <?php
                    $label = '5.6';
                    $varName = 'var_check_6';
                    $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
                    ?>
                    <?= EzformWidget::label($label)?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                    <?php
                    $label = '5.7';
                    $varName = 'var_check_7';
                    $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
                    ?>
                    <?= EzformWidget::label($label)?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
            </div>
        </div>   
        </fieldset> 
    </div>
  <br>
<fieldset>
    <legend style="    margin-left: -10px;">6.ลักษณะสถานที่เกิดเหตุ</legend>
<div class="row">
    <div class="col-md-6">
            <div class="form-group">
                <?php
                    $label = "สภาพสถานที่เกิดเหตุเมื่อไปถึง";
                    $varName = 'var_form01_sub1_checkbox_outside_1';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                    $varNameOther = 'var_form01_sub1_radio_other_tool1';
                    $suffixOther = '';
                    $items = 'tools_by';

                    echo $this->render("../template/checkbox.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'varNameOther' => $varNameOther,
                        'suffixOther' => $suffixOther,
                        'items' => $items,
                        'number' => 4
                    ]);
                ?>
            </div>
            <div class="form-group">
                 <?php
                    $label = "บ้านไม้";
                    $varName = 'var_form01_sub1_checkbox_outside_2';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                    $varNameOther = 'var_form01_sub1_radio_other_tool2';
                    $suffixOther = '';
                    $items = 'tools_by';

                    echo $this->render("../template/checkbox.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'varNameOther' => $varNameOther,
                        'suffixOther' => $suffixOther,
                        'items' => $items,
                        'number' => 4
                    ]);
                ?>
            </div>
            <div class="form-group">
                
                <?php
                    $label = "บ้านครึ่งตึกครึ่งไม้";
                    $varName = 'var_form01_sub1_checkbox_outside_3';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                    $varNameOther = 'var_form01_sub1_radio_other_tool3';
                    $suffixOther = '';
                    $items = 'tools_by';

                    echo $this->render("../template/checkbox.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'varNameOther' => $varNameOther,
                        'suffixOther' => $suffixOther,
                        'items' => $items,
                        'number' => 4
                    ]);
                ?>
            </div>
            <div class="form-group">
                
                <?php
                    $label = "อาคารคอนกรีต";
                    $varName = 'var_form01_sub1_checkbox_outside_4';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                    $varNameOther = 'var_form01_sub1_radio_other_tool4';
                    $suffixOther = '';
                    $items = 'tools_by';

                    echo $this->render("../template/checkbox.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'varNameOther' => $varNameOther,
                        'suffixOther' => $suffixOther,
                        'items' => $items,
                        'number' => 4
                    ]);
                ?>
            </div>
            <div class="form-group">
                <?php
                    $label = "ทาวน์เฮ้าส์";
                    $varName = 'var_form01_sub1_checkbox_outside_5';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                    $varNameOther = 'var_form01_sub1_radio_other_tool5';
                    $suffixOther = '';
                    $items = 'tools_by';

                    echo $this->render("../template/checkbox.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'varNameOther' => $varNameOther,
                        'suffixOther' => $suffixOther,
                        'items' => $items,
                        'number' => 4
                    ]);
                ?> 
            </div>
            <div class="form-group">
                
                <?php
                    $label = "อาคารพานิชย์";
                    $varName = 'var_form01_sub1_checkbox_outside_6';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                    $varNameOther = 'var_form01_sub1_radio_other_tool6';
                    $suffixOther = '';
                    $items = 'tools_by';

                    echo $this->render("../template/checkbox.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'varNameOther' => $varNameOther,
                        'suffixOther' => $suffixOther,
                        'items' => $items,
                        'number' => 4
                    ]);
                ?> 
            </div>
            <div class="form-group">
                <?php
                    $label = "อื่นๆ";
                    $varName = 'var_form01_sub1_checkbox_outside_7';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                    $varNameOther = 'var_form01_sub1_radio_other_tool7';
                    $suffixOther = '';
                    $items = 'tools_by';

                    echo $this->render("../template/checkbox.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'varNameOther' => $varNameOther,
                        'suffixOther' => $suffixOther,
                        'items' => $items,
                        'number' => 4,
                        'options'=>'1'
                    ]);
                ?> 
            </div>    
    </div>
    <div class="col-md-6">

        <div class="form-group">
            <?php
            $label = 'ปริเวณโดยรอบ';
            $varName = 'var_fence';
            $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;
            $items = ['data'=>CoreFunc::itemAlias('fence')];
            ?>
            <?= EzformWidget::label($label)?>
            <?= EzformWidget::radioList("Notify[content][$varName][value]", $value, $items, ['inline'=>true])?>
            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
        </div>

        <div class="form-group">
            <?php
                    $label = "ด้านหน้าติด";
                    $varName = 'var_form01_sub1_checkbox_outside_001';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                    $varNameOther = 'var_form01_sub1_radio_other_too001';
                    $suffixOther = '';
                    $items = 'tools_by';

                    echo $this->render("../template/checkbox.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'varNameOther' => $varNameOther,
                        'suffixOther' => $suffixOther,
                        'items' => $items,
                        'number' => 4,
                        'options'=>'1'
                    ]);
                ?> 
            </div>   

            <div class="form-group">
                 
                 <?php
                    $label = "ด้านซ้ายติด";
                    $varName = 'var_form01_sub1_checkbox_outside_002';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                    $varNameOther = 'var_form01_sub1_radio_other_too002';
                    $suffixOther = '';
                    $items = 'tools_by';

                    echo $this->render("../template/checkbox.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'varNameOther' => $varNameOther,
                        'suffixOther' => $suffixOther,
                        'items' => $items,
                        'number' => 4,
                        'options'=>'1'
                    ]);
                ?> 
            </div>   

            <div class="form-group">
                
                <?php
                    $label = "ด้านขวาติด";
                    $varName = 'var_form01_sub1_checkbox_outside_002';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                    $varNameOther = 'var_form01_sub1_radio_other_too002';
                    $suffixOther = '';
                    $items = 'tools_by';

                    echo $this->render("../template/checkbox.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'varNameOther' => $varNameOther,
                        'suffixOther' => $suffixOther,
                        'items' => $items,
                        'number' => 4,
                        'options'=>'1'
                    ]);
                ?> 
            </div> 
            <div class="form-group">

                <?php
                $label = "ด้านหลังติด";
                $varName = 'var_form01_sub1_checkbox_outside_002';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                $varNameOther = 'var_form01_sub1_radio_other_too002';
                $suffixOther = '';
                $items = 'tools_by';

                echo $this->render("../template/checkbox.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                    'varNameOther' => $varNameOther,
                    'suffixOther' => $suffixOther,
                    'items' => $items,
                    'number' => 4,
                    'options' => '1'
                ]);
                ?> 
            </div> 
            <div class="form-group">
                    <?php
                    $label = 'ลักษณะภายใน';
                    $varName = 'var_form01_sub1_textbox_outside_00001';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                    echo $this->render("../template/text.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                    ]);
                    ?>
                    
            </div>

            <div class="form-group">
                    <?php
                        $label = 'บริเวณที่เกิดเหตุ เกิดเหตุที่';
                        $varName = 'var_form01_sub1_textbox_outside_00002';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                        echo $this->render("../template/text.php", [
                            'varName' => $varName,
                            'label' => $label,
                            'value' => $value,
                        ]);
                    ?>
            </div>
    </div>
</div>
</fieldset>
<br>
<fieldset>
    <legend style="    margin-left: -10px;">7.ผลการตรวจสถานที่เกิดเหตุ</legend>
<div class="form-group">
    <?php
        $label = 'พฤติการณ์ของคดี';
        $varName = 'var_form01_sub1_textbox_outside_0001';
        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";


        echo $this->render("../template/editor.php", [
            'varName' => $varName,
            'label' => $label,
            'value' => $value,
        ]);
    ?>
</div>


<div class="form-group">
    <?= EzformWidget::label('ทางเข้าคนร้าย')?>

    <div class="form-group">
        <?php
        $label = 'ไม่พบร่องรอยใดๆ บริเวณสถานที่เกิดเหตุ';
        $varName = 'var_form01_sub1_checkbox_entrance_1';
        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
        $varNameOther = 'var_form01_sub1_radio_other_entrance1';
        $suffixOther = '';
        echo $this->render("../template/checkbox.php", [
            'varName' => $varName,
            'label' => $label,
            'value' => $value,
            'varNameOther' => $varNameOther,
            'suffixOther' => $suffixOther,
        ]);
        ?>
 
        <?php
            $label = 'ผู้เสียหายไม่ได้ทำการปิดล็อกประตู / หน้าต่าง';
            $varName = 'var_form01_sub1_checkbox_entrance_2';
            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
            $varNameOther = 'var_form01_sub1_radio_other_entrance2';
            $suffixOther = '';
            echo $this->render("../template/checkbox.php", [
                'varName' => $varName,
                'label' => $label,
                'value' => $value,
                'varNameOther' => $varNameOther,
                'suffixOther' => $suffixOther,
                
            ]);
        ?>
 
 
    <div class="form-group">
         
            <?php
                $label = 'พบร่องรอย';
                $varName = 'var_trai_checkbox_other1';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                $varNameOther = 'var_trai_checkbox_other1';
                $suffixOther = '';
                echo $this->render("../template/checkbox.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                    'varNameOther' => $varNameOther,
                    'suffixOther' => $suffixOther,
                    'items' => $items,
                ]);
                ?>
        
        
            <?php
                $label = 'การงัด';
                $varName = 'var_trai_checkbox_other2';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                $varNameOther = 'var_trai_checkbox_other2';
                $suffixOther = '';
                echo $this->render("../template/checkbox.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                    'varNameOther' => $varNameOther,
                    'suffixOther' => $suffixOther,
                    'items' => $items,
                ]);
                ?>
        
        <?php
                $label = 'การตัด';
                $varName = 'var_trai_checkbox_other3';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                $varNameOther = 'var_trai_checkbox_other3';
                $suffixOther = '';
                echo $this->render("../template/checkbox.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                    'varNameOther' => $varNameOther,
                    'suffixOther' => $suffixOther,
                    'items' => $items,
                ]);
                ?>
        <?php
                $label = 'การเจาะ';
                $varName = 'var_trai_checkbox_other4';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                $varNameOther = 'var_trai_checkbox_other4';
                $suffixOther = '';
                echo $this->render("../template/checkbox.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                    'varNameOther' => $varNameOther,
                    'suffixOther' => $suffixOther,
                    'items' => $items,
                ]);
                ?>
                <?php
                $label = 'ร่องรอยอื่นๆ';
                $varName = 'var_form01_sub1_trai_checkbox_other5';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                $varNameOther = 'var_form01_sub1_trai_checkbox_other6';
                $suffixOther = '';
                echo $this->render("../template/checkbox.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                    'varNameOther' => $varNameOther,
                    'suffixOther' => $suffixOther,
                    'items' => $items,
                ]);
                ?> 
                 
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <?php
                    $label = 'ประตู';
                    $varName = 'var_trai_checkbox_other6';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                    $varNameOther = 'var_trai_checkbox_other6';
                    $suffixOther = '';
                    echo $this->render("../template/checkbox.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'varNameOther' => $varNameOther,
                        'suffixOther' => $suffixOther,
                        'items' => $items,
                         
                    ]);
                    ?> 
                </div>
                <div class="col-md-4">
                    <?php
                    $label = 'หน้าต่าง';
                    $varName = 'var_trai_checkbox_other7';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                    $varNameOther = 'var_trai_checkbox_other7';
                    $suffixOther = '';
                    echo $this->render("../template/checkbox.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'varNameOther' => $varNameOther,
                        'suffixOther' => $suffixOther,
                        'items' => $items,
                         
                    ]);
                    ?> 
                </div>
                <div class="col-md-4">
                    <?php
                    $label = 'ฝ้าเพดาน';
                    $varName = 'var_trai_checkbox_other8';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                    $varNameOther = 'var_trai_checkbox_other8';
                    $suffixOther = '';
                    echo $this->render("../template/checkbox.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'varNameOther' => $varNameOther,
                        'suffixOther' => $suffixOther,
                        'items' => $items,
                         
                    ]);
                    ?> 
                </div>
                <div class="col-md-4">
                    <?php
                    $label = 'หลังคา';
                    $varName = 'var_trai_checkbox_other9';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                    $varNameOther = 'var_trai_checkbox_other9';
                    $suffixOther = '';
                    echo $this->render("../template/checkbox.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'varNameOther' => $varNameOther,
                        'suffixOther' => $suffixOther,
                        'items' => $items,
                         
                    ]);
                    ?> 
                </div>
                
                <div class="col-md-4">
                    <?php
                    $label = 'อื่นๆ';
                    $varName = 'var_trai_checkbox_other010';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                    $varNameOther = 'var_trai_checkbox_other010';
                    $suffixOther = '';
                    echo $this->render("../template/checkbox.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'varNameOther' => $varNameOther,
                        'suffixOther' => $suffixOther,
                        'items' => $items,
                        'options'=>1 
                    ]);
                    ?> 
                </div>
                
            </div>
              
        </div>
         
    </div>

   
    </div>    
</div>
<br>


    <div class="col-md-6">
        
        <?php 
            //tools_used_by_criminals_to_steal 
            $label="เครื่องมือที่คนร้ายใช้ในการโจรกรรม";
            $varName = 'var_form01_sub1_radio_tool1';
            $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;
            $varNameOther = 'var_form01_sub1_radio_other_tool1';
            $suffixOther='';
            $items = 'tools_by';
            
            echo $this->render("../template/radio.php",[
                'varName'=>$varName,
                'label'=>$label,
                'value'=>$value,
                'varNameOther'=>$varNameOther,
                'suffixOther'=>$suffixOther,
                'items'=>$items,
                'number'=>4
            ]);
        ?>
    </div>    
        <div class="col-md-6">
            <?php
            $label = 'ขนาดความกว้าง (ซม.)';
            $varName = 'var_form1_width';
            $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
            ?>
            <?= EzformWidget::label($label)?>
            <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
        </div>
        <div class="col-md-2 col-xs-4 label-center-input"></div>
        <div class="clearfix"></div><br>
        <?= EzformWidget::label('คดีชิงทรัพย์/ปล้นทรัพย์ กรณีทราบข้อมูลคนร้าย')?>
        <div class="col-md-10 col-xs-8">
            <?php
            $label = 'จำนวนคนร้าย (คน)';
            $varName = 'var_form1_number_of_villains';
            $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
            ?>
            <?= EzformWidget::label($label)?>
            <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
        </div>
        <div class="col-md-2 col-xs-4 label-center-input"></div>
        
        <div class="clearfix"></div> 
        
        <div class="form-group">
            <?php
            $label = '';
            $varName = 'var_form1_weapon';
            $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;

            $varNameOther = 'var_radio_other_form1_weapon';
            $suffixOther = '';

            $items = [
                'data' => CoreFunc::itemAlias('var_form1_weapon'),
                'other' => [
                    4=>[
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
            $label = 'คนร้ายได้พันธนาการผู้เสียหายอย่างไร';
            $varName = 'var_form1_bondage';
            $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;

            $varNameOther = 'var_radio_other_form1_bondage';
            $suffixOther = 'ในการพันธนาการ';

            $items = [
                'data' => CoreFunc::itemAlias('var_form1_bondage'),
                'other' => [
                    2=>[
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
            $label = 'ลักษณะตำแหน่งจำนวนของบาดเเผล';
            $varName = 'var_form1_number_of_villains';
            $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
            ?>
            <?= EzformWidget::label($label)?>
            <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
        </div>
        <br>
        <?php
            $label = 'สถาพร่องรอยและตำแหน่งที่ตรวจพบ';
                echo EzformWidget::label($label);
            ?>
        <div class="clearfix"></div>
        <div class="col-md-6"> 
        <div class="form-group">
                <?php
                $label = 'บริเวณ';
                $varName = 'var_condition_trace_and_location_detected_1';
                $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;
                $varNameOther = 'var_roof_other_var_condition_trace_and_location_detected_1';
                $suffixOther = '';
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
                $label = ' รอยงัด';
                $varName = 'var_condition_trace_and_location_detected_2';
                $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;
                $varNameOther = 'var_roof_other_var_condition_trace_and_location_detected_2';
                $suffixOther = '';
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
                $label = 'ร่องรอยลื้นค้น';
                $varName = 'var_condition_trace_and_location_detected_3';
                $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;
                $varNameOther = 'var_roof_other_var_condition_trace_and_location_detected_3';
                $suffixOther = '';
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
                $label = 'วัตถุพยานอื่นๆที่ตรวจพบ';
                $varName = 'var_condition_trace_and_location_detected_4';
                $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;
                $varNameOther = 'var_roof_other_var_condition_trace_and_location_detected_4';
                $suffixOther = '';
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
        </div>   
        
        <div class="col-md-6"> 
            <?php
            $label = 'สถาพร่องรอยและตำแหน่งที่ตรวจพบ (ต่อ)';
                echo EzformWidget::label($label);
            ?>
        <div class="form-group">
                <?php
                $label = 'บริเวณ';
                $varName = 'var_condition_trace_and_location_detected_5';
                $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;
                $varNameOther = 'var_roof_other_var_condition_trace_and_location_detected_5';
                $suffixOther = '';
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
                $label = ' รอยงัด';
                $varName = 'var_condition_trace_and_location_detected_6';
                $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;
                $varNameOther = 'var_roof_other_var_condition_trace_and_location_detected_6';
                $suffixOther = '';
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
                $label = 'ร่องรอยลื้นค้น';
                $varName = 'var_condition_trace_and_location_detected_7';
                $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;
                $varNameOther = 'var_roof_other_var_condition_trace_and_location_detected_7';
                $suffixOther = '';
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
                $label = 'วัตถุพยานอื่นๆที่ตรวจพบ';
                $varName = 'var_condition_trace_and_location_detected_8';
                $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;
                $varNameOther = 'var_roof_other_var_condition_trace_and_location_detected_8';
                $suffixOther = '';
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
        </div>
        
        <br>
        <?php
            $label = 'สถาพร่องรอยและตำแหน่งที่ตรวจพบ';
                echo EzformWidget::label($label);
            ?>
        <div class="clearfix"></div>
        <div class="form-group">
                <?php
                $label = 'คลาบสีเเดงคล้ายโรหิต';
                $varName = 'var_condition_Blood';
                $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;
                $varNameOther = 'var_roof_other_var_condition_trace_and_location_detected_9';
                $suffixOther = '';
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
                $label = 'ทดสอบด้วยชุดทดสอบคราบโลหิตเบื้องต้น';
                $varName = 'var_condition_Blood_baba';
                $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;

                $varNameOther = 'var_check_otherdfgdgdg';
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
        <div class="col-md-12">
            <div class="col-md-4">
                 <?php
                $label = 'Hemastx';
                $varName = 'var_hemastx';
                $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;

                $varNameOther = 'var_check_other';
                $suffixOther = '';

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
                <div class="col-md-8">
                    <?php
                        $label = '';
                        $varName = 'var_demo_blood';
                        $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;

                        $items = [
                            'data'=>CoreFunc::itemAlias('demo_blood'),
                        ];
                        ?>
                        <?= EzformWidget::label($label)?>
                        <?= EzformWidget::radioList("Notify[content][$varName][value]", $value, $items, ['inline'=>true])?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
               </div>
         </div> 
        
        <div class="col-md-12">
            <div class="col-md-4">
                 <?php
                $label = 'Phenolpatnaeain';
                $varName = 'var_phenolpatnaeain';
                $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;

                $varNameOther = 'var_phenolpatnaeain_check_other';
                $suffixOther = '';

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

                <? EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
                <?= EzformWidget::hiddenInput("Notify[content][$varNameOther][suffix]", $suffixOther)?>
            </div>
                <div class="col-md-8">
                    <?php
                        $label = '';
                        $varName = 'var_phenolpatnaeain_item';
                        $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;

                        $items = [
                            'data'=>CoreFunc::itemAlias('demo_blood'),
                        ];
                        ?>
                        <?= EzformWidget::label($label)?>
                        <?= EzformWidget::radioList("Notify[content][$varName][value]", $value, $items, ['inline'=>true])?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
               </div>
         </div>
        
   
            <div class="col-md-6">
                 <?php
                $label = 'เส้นผม/เส้นขน';
                $varName = 'var_hairline_1';
                $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;

                $varNameOther = 'var_var_hairline_check_other_1';
                $suffixOther = '';

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

                <? EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
                <?= EzformWidget::hiddenInput("Notify[content][$varNameOther][suffix]", $suffixOther)?>
            </div>
        <div class="col-md-6">
                 <?php
                $label = 'เส้นใย';
                $varName = 'var_hairline_fiber_1';
                $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;

                $varNameOther = 'var_hairline_check_other_1';
                $suffixOther = '';

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

                <? EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
                <?= EzformWidget::hiddenInput("Notify[content][$varNameOther][suffix]", $suffixOther)?>
            </div>
        <div class="col-md-12">
            <div class="form-group">
                <?php
                $label = 'วัตถุพยานอื่นๆ';
                $varName = 'other_witnesses_1';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                ?>
                <?= EzformWidget::label($label) ?>
                <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?php
                $label = 'ทรับพย์สินที่ถูกโจรกรรม';
                $varName = 'stolen_goods_1';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                ?>
                <?= EzformWidget::label($label) ?>
                <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?php
                $label = 'วัตถุพยานที่ตรวจเก็บ';
                $varName = 'witnessed_object_1';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                ?>
                <?= EzformWidget::label($label) ?>
                <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
            </div>
        </div>
         <div class="col-md-12">
            <div class="form-group">
                <?php
                $label = 'การดำเนินการเกี่ยวกับวัตถุพยาน';
                $varName = 'action_on_witness_material';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                ?>
                <?= EzformWidget::label($label) ?>
                <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?php
                $label = '';
                $varName = 'last_inspection_1';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                $items = [
                    'data' => CoreFunc::itemAlias('last_inspection_1'),
                ];
                ?>
                <?= EzformWidget::label($label) ?>
                <?= EzformWidget::radioList("Notify[content][$varName][value]", $value, $items, ['inline' => true]) ?>
                <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
            </div>
        </div>
</fieldset>
<div class="row">
    <div class="col-md-12">
        <fieldset>
            <legend style="    margin-left: -10px;">8.การส่งมอบคืนสถานที่เกิดเหตุ</legend>
       
          <div class="col-md-6"></div>    
        <div class="col-md-6">
            <?php $label = 'วันที่ทำการตรวจสอบสถานที่เกิดเหตุเสร็จ'; ?>
            <label><?= $label; ?></label>
            <?php
            $varName = '_form1_sub_notification_01_inspection1_date1';
            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
            echo DatePicker::widget([
                'name' => "Notify[content][$varName][value]",
                //'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'value' => $value,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);
            ?>
            <!--<input type="text" class="form-control" name="Notify[content][_form1_sub_notification_01_date1][value]" value="<?= $value; ?>">-->
        </div>
         
        <div class="clearfix"></div>
  
        <div class="col-md-6"></div>
        <div class="col-md-6" style="margin-top:20px">
            <div class="text-center" style="text-align: center;margin-bottom:20px;"><b>การส่งมอบสถานที่เกิดเหตุ</b></div>
            <div class="form-group">
                <?php
                $label = 'ลงชื่อ (ผู้มอบสถานที่เกิดเหตุ)';
                $varName = 'var_sign_the_place_of_delivery';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                ?>
                <?= EzformWidget::label($label) ?>
                <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
            </div>
            <!--<input type="text" class="form-control" name="Notify[content][_form1_sub_notification_01_date1][value]" value="<?= $value; ?>">-->
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <div class="form-group">
                <?php
                $label = 'ตำแหน่ง';
                $varName = 'var_form1_position';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                ?>
                <?= EzformWidget::label($label) ?>
                <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
            </div>
            <!--<input type="text" class="form-control" name="Notify[content][_form1_sub_notification_01_date1][value]" value="<?= $value; ?>">-->
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <div class="form-group">
                <?php
                $label = 'ลงชื่อผู้มอบสถานที่เกิดเหตุ';
                $varName = 'var_sign_the_place_of_delivery';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                ?>
                <?= EzformWidget::label($label) ?>
                <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
            </div>
            <!--<input type="text" class="form-control" name="Notify[content][_form1_sub_notification_01_date1][value]" value="<?= $value; ?>">-->
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <div class="form-group">
                <?php
                $label = 'ตำแหน่ง';
                $varName = 'var_form1_position';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                ?>
                <?= EzformWidget::label($label) ?>
                <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
            </div>
            <!--<input type="text" class="form-control" name="Notify[content][_form1_sub_notification_01_date1][value]" value="<?= $value; ?>">-->
        </div>

    </div>
     </fieldset>
</div>

<style>
    fieldset{margin-left:20px;}
    .label-center-input{margin-top: 30px;}
</style>