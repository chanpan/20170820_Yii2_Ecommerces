<?php

use backend\modules\core\classes\CoreFunc;
use appxq\sdii\widgets\EzformWidget;
?>
<br>

<div class="row">
    <fieldset>
        <legend>1.การรับแจ้งเหตุ</legend>
        <div class="col-md-12">
            <div class="col-md-8">
                <?php
                $label = "คดี";
                $varName = 'var_form03_radio_tool_1';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                $varNameOther = 'var_form03_orther_radio_tool_1';
                $suffixOther = '';
                $items = 'asset_case_type';

                echo $this->render("../template/radio.php", [
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
            <div class="col-md-4">
                <?php
                $label = "วันที่";
                $varName = 'var_form03_sub1_date_1';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';

                echo $this->render("../template/datepicker.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                ]);
                ?>
            </div>
            <div class="col-md-0">
                <?php
//                $label = "เวลาโดยประมาณ (น.)";
//                $varName = 'Notify[content][var_form03_sub1_time_1][value]';
//                $vname = "var_form03_sub1_time_1";
//                $value = isset($data['content'][$vname]['value']) ? $data['content'][$vname]['value'] : '';
//
//
//                echo $this->render("../template/timpicker.php", [
//                    'varName' => $varName,
//                    'label' => $label,
//                    'value' => $value,
//                    'vname' => $vname
//                ]);
                ?>

            </div>
        </div>
        
        <!--การรับแจ้ง -->
        <div class="col-md-12">
         
            <div class="col-md-12">
                <?php
                $label = "การรับแจ้ง";
                $varName = 'var_form03_radio_notification_1';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                $varNameOther = 'var_form03_orther_radio_notification_1';
                $suffixOther = '';
                $items = '_form1_sub_notification_01';

                echo $this->render("../template/radio.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                    'varNameOther' => $varNameOther,
                    'suffixOther' => $suffixOther,
                    'items' => $items,
                    'number' => 5
                ]);
                ?>
            </div>
            
            <div class="col-md-6">
                <?php
                $label = "พนักงานสอบสวน";
                $varName = 'var_form03_sub1_textbox_outside_0001';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                echo $this->render("../template/text.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                ]);
                ?>
            </div>
            <div class="col-md-6">
                <?php
                    $label = "หมายเลขโทรศัพท์";
                    $varName = 'var_form03_sub1_textbox_phone_0001';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                    echo $this->render("../template/text.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                    ]);
                ?>
            </div>
        </div>
    </fieldset>

</div>

<br>

<div class="row"> 
    <fieldset>
        <legend>2.สถานที่เกิดเหตุ</legend>
        <div class="col-md-12">
            <div class="col-md-12">
                <?php
                    $label = "สถานที่เกิดเหตุ";
                    $varName = 'var_form03_sub1_textbox_homess_0001';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                    echo $this->render("../template/text.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                    ]);
                ?>
            </div>
            <div class="col-md-12 margin-top">
                
                <?php
                $label = "ผู้เสียหาย";
                $varName = 'var_form03_radio_notification_2';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                $varNameOther = 'var_form03_orther_radio_notification_2';
                $suffixOther = '';
                $items = '_form1_sub_notification_01_sufferer';

                echo $this->render("../template/radio.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                    'varNameOther' => $varNameOther,
                    'suffixOther' => $suffixOther,
                    'items' => $items,
                    'number' => 5
                ]);
                ?>
            </div>
            
            <div class="col-md-6">
                <?php
                $label = "ชื่อ";
                $varName = 'var_form01_sub1_textbox_fullname_0001';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                echo $this->render("../template/text.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                ]);
                ?>
            </div>
            <div class="col-md-6">
                <?php
                $label = "อายุประมาณ (ปี)";
                $varName = 'var_form01_sub1_textbox_age_0001';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                echo $this->render("../template/text.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                ]);
                ?>
            </div>
            
        </div>
        
        
    </fieldset>
</div>    

<br>

<div class="row"> 
    <fieldset>
        <legend>3.วันเวลาที่พนักงานสอบสวน/ผู้เสียหาย ทราบสาเหตุ/เกิดเหตุ</legend>
        <div class="col-md-12">
            <div class="col-md-6">
                <?php
                $label = "วันที่";
                $varName = 'var_form03_sub2_date_v2_2sdfsdf111111111111111';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';

                echo $this->render("../template/datepicker.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                ]);
                ?>
            </div>
        </div>
    </fieldset>
</div>

<br>

<div class="row"> 
    <fieldset>
        <legend>4.วันเวลาที่ทำการตรวจสถานที่เกิดเหตุ</legend>
        <div class="col-md-12">
            <div class="col-md-6">
                <?php
                $label = "วันที่";
                $varName = 'var_form03_sub2_date_v2_2_dsfsdfsdfsdeeddfgdfg';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';

                echo $this->render("../template/datepicker.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                ]);
                ?>
            </div>
        </div>
    </fieldset>
</div>


 


<br>

<div class="row"> 
    <fieldset>
        <legend>5.ผู้ตรวจสอบสถานที่เกิดเหตุ</legend>
        <div class="col-md-12">
            <?php for($i=1; $i<=8; $i++): ?>
             <div class="col-md-6">
                <div class="form-group">
                        <?php
                        $label = "5.".$i;
                        $varName = 'var_form03_check_'.$i;
                        $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
                        ?>
                        <?= EzformWidget::label($label)?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
                </div>
             </div>
           <?php endfor; ?> 
        </div>
    </fieldset>
</div>

<br>

<div class="row"> 
    <fieldset>
        <legend>6.ลักษณะสถานที่เกิดเหตุ</legend>
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
        <div class="col-md-12">
             
            <div class="clearfix"></div>
            <br>
            
            <div class="col-md-6">
                 <?php
                
                  $label = "การรักษาสถานที่เกิดเหตุ";
                  $varName = 'var_form03_sub1_radio_have_v2_1';
                  $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                  $varNameOther = 'var_form03_sub1_radio_other_have_v2_1';
                  $suffixOther = '';
                  $items = '_have';

                  echo $this->render("../template/radio.php", [
                  'varName' => $varName,
                  'label' => $label,
                  'value' => $value,
                  'varNameOther' => $varNameOther,
                  'suffixOther' => $suffixOther,
                  'items' => $items,
                  'number' => 2
                  ]); 
                ?>
            </div>
            <div class="col-md-6">
                 <?php
                
                  $label = "แสงสว่าง(ที่สังเกตเห็น)";
                  $varName = 'var_form03_sub1_radio_lighting_v2_1';
                  $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                  $varNameOther = 'var_form03_sub1_radio_other_lighting_v2_1';
                  $suffixOther = '';
                  $items = 'lighting';

                  echo $this->render("../template/radio.php", [
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
            
            <div class="col-md-6">
                 <?php
                
                  $label = "อุณหภูมิ";
                  $varName = 'var_form03_sub1_radio_temperature_v2_1';
                  $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                  $varNameOther = 'var_form03_sub1_radio_other_temperature_v2_1';
                  $suffixOther = '';
                  $items = 'temperature';

                  echo $this->render("../template/radio.php", [
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
            <div class="col-md-6">
                 <?php
                
                  $label = "กลิ่น";
                  $varName = 'var_form03_sub1_radio_smell_v2_1';
                  $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                  $varNameOther = 'var_form03_sub1_radio_other_smell_v2_1';
                  $suffixOther = '';
                  $items = '_have';

                  echo $this->render("../template/radio.php", [
                  'varName' => $varName,
                  'label' => $label,
                  'value' => $value,
                  'varNameOther' => $varNameOther,
                  'suffixOther' => $suffixOther,
                  'items' => $items,
                  'number' => 2
                  ]); 
                ?>
            </div>
            <br>
            <div><b>ลักษณะสถานที่เกิดเหตุ</b></div><br>
            <div class="col-md-12">
                <div class="col-md-12">
                    <?php

                     $label = "กรณีเกิดเหตุภายนอกอาคาร";
                     $varName = 'var_form03_sub1_radio_outroom_v2_1';
                     $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                     $varNameOther = 'var_form03_sub1_radio_other_outroom_v2_1';
                     $suffixOther = '';
                     $items = 'outdoors';

                     echo $this->render("../template/radio.php", [
                     'varName' => $varName,
                     'label' => $label,
                     'value' => $value,
                     'varNameOther' => $varNameOther,
                     'suffixOther' => $suffixOther,
                     'items' => $items,
                     'number' => 5
                     ]); 
                   ?>
               </div>
            </div>
            
             
             
            <div class="col-md-12">
                <div class="col-md-12">
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php
                            $label = "สภาพบริเวณโดยรอบ เมื่อหันหน้าเข้า";
                            $varName = 'var_form03_sub1_checkboxs_outside_0001';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form03_sub1_checkboxs_outside_0001';
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
                            $label = "ด้านหน้าติด";
                            $varName = 'var_form03_sub1_checkbox_outside_0001';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form03_sub1_radio_other_outside_0001';
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
                            $label = "ด้านซ้ายติด";
                            $varName = 'var_form03_sub1_checkbox_outside_0002';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form03_sub1_radio_other_outside_0002';
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
                            $label = "ด้านขวาติด";
                            $varName = 'var_form03_sub1_checkbox_outside_0003';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form03_sub1_radio_other_outside_0003';
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
                            $label = "ด้านหลังติด";
                            $varName = 'var_form03_sub1_checkbox_outside_0004';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form03_sub1_radio_other_outside_0004';
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
                    </div>
                </div>
                
            </div>    
            
             <br>
            <div><b>กรณีเกิดเหตุภายในอาคาร</b></div><br>
            <div class="col-md-12">
                <div class="col-md-6">
                    <?php

                     $label = "ลักษณะภายนอก";
                     $varName = 'var_form03_sub1_radio_roomsmes_v2_1';
                     $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                     $varNameOther = 'var_form03_sub1_radio_other_roomsmes_v2_1';
                     $suffixOther = '';
                     $items = 'rooms';

                     echo $this->render("../template/radio.php", [
                     'varName' => $varName,
                     'label' => $label,
                     'value' => $value,
                     'varNameOther' => $varNameOther,
                     'suffixOther' => $suffixOther,
                     'items' => $items,
                     'number' => 3
                     ]); 
                   ?>
               </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?php
                        $label = 'สภาพปริเวณโดยรอบ';
                        $varName = 'var_form03_sub1_fence_0001';
                        $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;
                         
                             
                              $varNameOther = 'var_form03_sub1_fence_other_0001';
                              $suffixOther = '';
                              $items = 'fence';

                              echo $this->render("../template/radio.php", [
                              'varName' => $varName,
                              'label' => $label,
                              'value' => $value,
                              'varNameOther' => $varNameOther,
                              'suffixOther' => $suffixOther,
                              'items' => $items,
                              'number' => 10
                              ]); 
                        ?>
                        
                    </div>
                </div>
                <div class="clearfix"></div>
                
                <div class="col-md-12">
                <div class="col-md-12">
                    <div class="form-group">
                            <?php
                            $label = "เมื่อหันหน้าเข้า";
                            $varName = 'var_form03_sub1_textbox_Surroundin_gconditions_00001';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form03_sub1_textbox_Surroundin_gconditions_other_00001';
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
                            $label = "ด้านหน้าติด";
                            $varName = 'var_form03_sub1_textbox_Surroundin_gconditions_00002';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form03_sub1_textbox_Surroundin_gconditions_other_00002';
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
                            $label = "ด้านซ้ายติด";
                            $varName = 'var_form03_sub1_textbox_Surroundin_gconditions_00003';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form03_sub1_textbox_Surroundin_gconditions_other_00003';
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
                            $label = "ด้านขวาติด";
                            $varName = 'var_form03_sub1_textbox_Surroundin_gconditions_00004';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form03_sub1_textbox_Surroundin_gconditions_other_00004';
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
                            $label = "ด้านหลังติด";
                            $varName = 'var_form03_sub1_textbox_Surroundin_gconditions_00005';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form03_sub1_textbox_Surroundin_gconditions_other_00005';
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
                        $varName = 'var_form03_sub1_textbox_outside_00001';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                        echo $this->render("../template/text.php", [
                            'varName' => $varName,
                            'label' => $label,
                            'value' => $value,
                        ]);
                        ?>

                    </div>
                 
                </div>
                    <div style="display: block;
    width: 100%;
    padding: 0;
    margin-bottom: 20px;
    font-size: 21px;
    line-height: inherit;
    color: #333;
    border: 0;
    border-bottom: 1px solid #e5e5e5;
    margin-left: -42px;">7.ผลการตรวจสถานที่เกิดเหตุ</div>
                    

                    <div class="form-group">
                        <?php
                        $label = 'บริเวณที่เกิดเหตุ เกิดเหตุที่';
                        $varName = 'var_form03_sub1_textbox_outside_00002';
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
                        $label = 'พฤติการณ์ของคดี';
                        $varName = 'var_form01_sub1_textbox_outside_00012';
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
                
            </div>    
            </div>
            
            
            <div class="col-md-12"><div class="clearfix"></div>
                <b>โครงสร้างของสถานที่เกิดเหตุ</b>
                <div class="clearfix"></div>
                <div class="col-md-6">
                    <?php 
                          $label = "มีความกว้าง X ยาวประมาณ (ซม.)";
                          $varName = 'var_form03_width_001';
                          $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                          echo $this->render("../template/text.php", [
                          'varName' => $varName,
                          'label' => $label,
                          'value' => $value,
                          ]);
                          
                        ?>
                </div>
                <div class="col-md-6">
                    <?php 
                          $label = "ลักษณะโครงสร้าง";
                          $varName = 'var_form03_creates_001';
                          $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                          echo $this->render("../template/text.php", [
                          'varName' => $varName,
                          'label' => $label,
                          'value' => $value,
                          ]);
                          
                        ?>
                </div>
                <div class="col-md-6">
                    <?php 
                          $label = "ผนัง";
                          $varName = 'var_form03_creates2_001';
                          $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                          echo $this->render("../template/text.php", [
                          'varName' => $varName,
                          'label' => $label,
                          'value' => $value,
                          ]);
                          
                        ?>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                            <?php
                            $label = "ด้านหน้า";
                            $varName = 'var_form03_sub1_textbox_Surroundin_gconditions_0000002';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form03_sub1_textbox_Surroundin_gconditions_other_0000002';
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
                            $label = "ด้านซ้าย";
                            $varName = 'var_form03_sub1_textbox_Surroundin_gconditions_0000003';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form03_sub1_textbox_Surroundin_gconditions_other_0000003';
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
                            $label = "ด้านขวา";
                            $varName = 'var_form03_sub1_textbox_Surroundin_gconditions_0000004';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form03_sub1_textbox_Surroundin_gconditions_other_0000004';
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
                            $label = "ด้านหลัง";
                            $varName = 'var_form03_sub1_textbox_Surroundin_gconditions_0000005';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form03_sub1_textbox_Surroundin_gconditions_other_0000005';
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
                </div>
                
                <div class="col-md-6">
                    <?php 
                          $label = "พื้นห้อง";
                          $varName = 'var_form03_creates2_000001';
                          $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                          echo $this->render("../template/text.php", [
                          'varName' => $varName,
                          'label' => $label,
                          'value' => $value,
                          ]);
                          
                        ?>
                </div>
                <div class="col-md-6">
                    <?php 
                          $label = "หลังคา";
                          $varName = 'var_form03_creates2_00000001';
                          $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                          echo $this->render("../template/text.php", [
                          'varName' => $varName,
                          'label' => $label,
                          'value' => $value,
                          ]);
                          
                        ?>
                </div>
                <div class="col-md-6">
                    <?php 
                          $label = "การจัดวางสิ่งของ";
                          $varName = 'var_form03_creates2_000000dd01';
                          $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                          echo $this->render("../template/text.php", [
                          'varName' => $varName,
                          'label' => $label,
                          'value' => $value,
                          ]);
                          
                        ?>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="col-md-12">
                    <?php 
                          $label = "พฤติการณ์ของคดี";
                          $varName = 'var_form03_creates2_0000sdf0dd01';
                          $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                          echo $this->render("../template/text.php", [
                          'varName' => $varName,
                          'label' => $label,
                          'value' => $value,
                          ]);
                          
                        ?>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="col-md-12">
                    
                    <?php
                   
                      $label = "ศพ";
                      $varName = 'var_form03_sub1_body_00000000001';
                      $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                      $varNameOther = 'var_form03_sub1_body_other_00000000001';
                      $suffixOther = '';
                      $items = 'body';

                      echo $this->render("../template/radio.php", [
                      'varName' => $varName,
                      'label' => $label,
                      'value' => $value,
                      'varNameOther' => $varNameOther,
                      'suffixOther' => $suffixOther,
                      'items' => $items,
                      'number' => 3
                      ]); 
                    ?>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="col-md-12">
                    <?php 
                          $label = "สภาพศพ";
                          $varName = 'var_form03_sub1_body_textbox_000000000001';
                          $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                          echo $this->render("../template/text.php", [
                          'varName' => $varName,
                          'label' => $label,
                          'value' => $value,
                          ]);
                          
                        ?>
                </div>
            </div>
            <br>
            <div class="col-md-12">
                <div class="col-md-12">
                    <?php 
                       
                        $label = "การแต่งกายและทรัพย์สิน";
                        $varName = 'var_form01_sub1_radio_the_dress';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1_radio_other_tool_the_dress1';
                        $suffixOther = '';
                        $items = 'the_dress';

                        echo $this->render("../template/radio.php", [
                            'varName' => $varName,
                            'label' => $label,
                            'value' => $value,
                            'varNameOther' => $varNameOther,
                            'suffixOther' => $suffixOther,
                            'items' => $items,
                            'number' => 6
                        ]);
                    ?>
                </div>
            </div>
            
            <br>
            <div class="col-md-12">
                <div class="col-md-12">
                    <?php 
                       
                        $label = "สภาพรอยบาดแผลเบื้องต้น";
                        $varName = 'var_form01_sub1_radio_the_dress200000';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1_radio_other_tool_the_dress1kjhgf444';
                        $suffixOther = '';
                        $items = 'the_dress2';

                        echo $this->render("../template/radio.php", [
                            'varName' => $varName,
                            'label' => $label,
                            'value' => $value,
                            'varNameOther' => $varNameOther,
                            'suffixOther' => $suffixOther,
                            'items' => $items,
                            'number' => 2
                        ]);
                    ?>
                </div>
            </div>
            
            <br>
            <div class="col-md-12">
                <div class="col-md-12">
                    <?php 
                          $label = "ลักษณะบาดแผลคือ";
                          $varName = 'var_form03_sub1_body_textbox_000000099880000001';
                          $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                          echo $this->render("../template/textarea.php", [
                          'varName' => $varName,
                          'label' => $label,
                          'value' => $value,
                          ]);
                          
                        ?>
                </div>
            </div>
            
            <br>
            <div class="col-md-12 margin-top">
                <div class="col-md-12">
                    <?php 
                          $label = "ความเสียหาย (บ้านเรือน ยานพาหนะ ทรัพย์สิน)";
                          $varName = 'var_form03_sub1_body_textbox_00000009909876880000001';
                          $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                          echo $this->render("../template/textarea.php", [
                          'varName' => $varName,
                          'label' => $label,
                          'value' => $value,
                          ]);
                          
                        ?>
                </div>
            </div>
            
            <br>
            <div class="col-md-12"><br>
                <div><b>วัตถุพยานที่ตรวจพบ</b></div>
                <div class="col-md-4">
                     
                     <?php 
                                  
                        $label = "กล่องเหล็ก";
                        $varName = 'var_form01_sub1_checkbox_outside_container_1098765';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1_radio_other_container_tool1098765';
                        $suffixOther = '';
                        $items="container";
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
                                  
                        $label = "ถังแก๊ส";
                        $varName = 'var_form01_sub1_checkbox_outside_container_1098765dsf';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1_radio_other_container_tool1098765sdf';
                        $suffixOther = '';
                        $items="container";
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
                                  
                        $label = "ถังดับเพลิง";
                        $varName = 'var_form01_sub1_checkbox_outside_container_1098765d54sf';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1_radio_other_container_tool1098765sd43f';
                        $suffixOther = '';
                        $items="container";
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
                                  
                        $label = "ท่อเหล็ก";
                        $varName = 'var_form01_sub1_checkbox_outside_container_109sfdsfeeee8765dsf';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1_radio_other_containesdffsdeer_tool1098765sdf';
                        $suffixOther = '';
                        $items="container";
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
                                  
                        $label = "ท่อPVC";
                        $varName = 'var_form01_sub1_checkbox_osdfsutside_container_1098765dsf';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1_radio_fdsfother_container_tool1098765sdf';
                        $suffixOther = '';
                        $items="container";
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
                                  
                        $label = "น้ำยาแอร์";
                        $varName = 'var_form01_sub1_checkboxsf_osdfsutside_container_1098765dsf';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1_rasfdio_fdsfother_container_tool1098765sdf';
                        $suffixOther = '';
                        $items="container";
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
                                  
                        $label = "ระเบิดมาตรฐาน";
                        $varName = 'var_form01_sub1_checkbox_ossddccdfsutside_container_1098765dsf';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1_radio_fdsdrtesfother_container_tool1098765sdf';
                        $suffixOther = '';
                        $items="container";
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
                                  
                        $label = "อื่นๆ";
                        $varName = 'var_form01_sub1_checkbox_osdfsutside_cfdsdfghhgfdontainer_1098765dsf';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1_radio_fdsfother_contuytrainer_tool1098765sdf';
                        $suffixOther = '';
                        $items="container";
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
            
            <br>
            <div class="col-md-12"><br>
                <div><b>วิธีการจุดระเบิด</b></div>
                <div class="col-md-4">
                     
                     <?php 
                                  
                        $label = "กับดัก / เหยียบ / สะดุด";
                        $varName = 'var_form01_sub1_checkbox_aaaaaaaaaaaaa1';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1_aaaaaaaadddddd';
                        $suffixOther = '';
                        $items="container";
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
                
                <div class="col-md-4">
                     
                     <?php 
                                  
                        $label = "ลากสายไฟสี";
                        $varName = 'var_form01_sub1_checkbox_bbbaaa';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1_aaaaaadsfs333aadddddd';
                        $suffixOther = '';
                        $items="container";
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
                <div class="col-md-4">
                    <?php

                         
                          $label = "ความยาวสายไฟ (ซม.)";
                          $varName = 'var_form01_sub1_textbox_outside_0001dfsfsdfd';
                          $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                          echo $this->render("../template/text.php", [
                          'varName' => $varName,
                          'label' => $label,
                          'value' => $value,
                          ]);
                         
                        ?>
                </div>
                
                <div class="clearfix"></div>
                <div class="col-md-3 col-xs-3">
                     
                     <?php 
                                  
                        $label = "วิทยุสื่อสาร";
                        $varName = 'var_form01_sub1_checkbox_asdfssdfdsaaaaee22aaaaaaaa1';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                        $varNameOther = 'var_form01_sub1_aaaaaaaadddddddsfdas333';
                        $suffixOther = '';
                        $items="container";
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
                
                <div class="col-md-3 col-xs-3">
                     
                     <?php 
                                  
                        $label = "ยื่ห้อ";
                          $varName = 'var_form01_sub1_textbox_lfkorpoutside_0sdfsdfsdfsdfsfdsfsf001dfsfsdfd';
                          $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                          echo $this->render("../template/text.php", [
                          'varName' => $varName,
                          'label' => $label,
                          'value' => $value,
                          ]);

                        
                    ?>
                </div>
                <div class="col-md-3 col-xs-3">
                    <?php

                         
                          $label = "รุ่น";
                          $varName = 'var_form01_sub1_textbox_outside_0sdfsdfsdfsdfsfdsfsf001dfsfsdfd';
                          $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                          echo $this->render("../template/text.php", [
                          'varName' => $varName,
                          'label' => $label,
                          'value' => $value,
                          ]);
                         
                        ?>
                </div>
                
                <div class="col-md-3 col-xs-3">
                    <?php

                         
                          $label = "สี";
                          $varName = 'var_form01_sub1_textbox_outsidesdfsdfsddsffdsdsf_0sdfsdfsdfsdfsfdsfsf001dfsfsdfd_color';
                          $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                          echo $this->render("../template/text.php", [
                          'varName' => $varName,
                          'label' => $label,
                          'value' => $value,
                          ]);
                         
                        ?>
                </div>
                
                <div class="clearfix"></div>
                <div class="col-md-6">
                     
                     <?php 
                                  
                        $label = "รีโมทคอนโทรล";
                        $varName = 'var_form01_sub1_checkbox_asdfssdfdsaaaaee22aaaaaaaa1_remote_control';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1_aaaaaaaadddddddsfdas333_remote_control';
                        $suffixOther = '';
                        $items="container";
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
                <div class="col-md-6">
                     
                     <?php 
                                  
                        $label = "ตั้งเวลา";
                        $varName = 'var_form01_sub1_checkbox_asdfssdfdsaaaaee22aaaaaaaa1_set_time';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1_aaaaaaaadddddddsfdas333__set_time';
                        $suffixOther = '';
                        $items="container";
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
                <div class="col-md-6">
                     
                     <?php 
                                  
                        $label = "อื่นๆ";
                        $varName = 'var_form01_sub1_checkbox_asdfssdfdsaaaaeesfdf332aaaaaaaa1_remote_control';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1_aaaaaaaadddddddsfdas333_remote_controlsdfsdf';
                        $suffixOther = '';
                        $items="container";
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
            
            <div class="col-md-12">
                <div><b>สะเก็ตระเบิด</b></div>
                <div class="col-md-4">
                     
                     <?php 
                                  
                        $label = "เหล็กเส้นตัดท่อน";
                        $varName = 'var_form01_sub1_psdlxkd006';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1_psdlxkd006_orther';
                        $suffixOther = '';
                        $items="container";
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
                <div class="col-md-4">
                    <?php

                         
                          $label = "ความยาว (ซม.)";
                          $varName = 'var_form01_sub1_textbox_fdedd';
                          $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                          echo $this->render("../template/text.php", [
                          'varName' => $varName,
                          'label' => $label,
                          'value' => $value,
                          ]);
                         
                        ?>
                </div>
                
                <div class="col-md-4">
                     
                     <?php 
                                  
                        $label = "ตะปู (นิ้ว)";
                        $varName = 'var_form01_sub1_psdldfsfxkd00sdfdsf_6';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1_psdlxkd006sdfsf_ortherdf';
                        $suffixOther = '';
                        $items="container";
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
                <div class="col-md-4">
                     
                     <?php 
                                  
                        $label = "อื่นๆ";
                        $varName = 'var_form01_sub1_psdldfsfxkd00fffffffffffsdfdsf_6';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1_psdlxkd00fffffffff6sdfsf_ortherdf';
                        $suffixOther = '';
                        $items="container";
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
            
            
            <br><div class="clearfix"></div>
            <b>ส่วนประกอบของวัตถุระเบิด</b>
            <div class="clearfix"></div>
            <div class="col-md-6">
                     
                     <?php 
                                  
                        $label = "หลอดดินขยาย";
                        $varName = 'var_form01_sub1_psdldfsfxkd00fffgdsseee_6';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1_psdlsdfvvbbccf6sdfsf_ortherdf';
                        $suffixOther = '';
                        $items="container";
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
            
            <div class="col-md-6">
                     
                     <?php 
                                  
                        $label = "เชื้อปะทุไฟฟ้า";
                        $varName = 'var_form01_sub1_pcccsdldfsfxkd00fffgdsseee_6';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1_pccsdlsdfvvbbccf6sdfsf_ortherdf';
                        $suffixOther = '';
                        $items="container";
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
            
            <div class="col-md-6">
                     
                     <?php 
                                  
                        $label = "เทปพันสายไฟ";
                        $varName = 'var_form01_sub1_pcccsdldfsfccvvvxkd00fffgdsseee_6';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1_pccsdlsdfvvbbvvvccccf6sdfsf_ortherdf';
                        $suffixOther = '';
                        $items="container";
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
            <div class="col-md-6">
                     
                     <?php 
                                  
                        $label = "ซิมการ์ด";
                        $varName = 'var_form01_sub1zimcard_pcccsdldfsfccvvvxkd00fffgdsseee_6';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_sub1zimcard_pccsdlsdfvvbbvvvccccf6sdfsf_ortherdf';
                        $suffixOther = '';
                        $items="container";
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
            
            <div class="col-md-6">
                     
                     <?php 
                                  
                        $label = "วงจรการจุดระเบิด";
                        $varName = 'var_form01_dogsub1zimcard_pcccsdldfsfccvvvxkd00fffgdsseee_6';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_dogsub1zimcard_pccsdlsdfvvbbvvvccccf6sdfsf_ortherdf';
                        $suffixOther = '';
                        $items="container";
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
            <div class="clearfix"></div>
            <div class="col-md-4 col-xs-4">
                     
                     <?php 
                                  
                        $label = "แบตเตอรี่";
                        $varName = 'var_form01_dogsub1zimcardbattery_pcccsdldfsfccvvvxkd00fffgdsseee_6';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_dogsub1zimcard_pccsdlsdfvvbbvvvccccf6sdfsf_ortherdf';
                        $suffixOther = '';
                        $items="container";
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
            <div class="col-md-2 col-xs-4" style="    margin-top: -20px;">
                    <?php

                         
                          $label = "V";
                          $varName = 'var_form01_sub1_textboxffffvvvvvvvvvvv_fdedd';
                          $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                          echo $this->render("../template/text.php", [
                          'varName' => $varName,
                          'label' => $label,
                          'value' => $value,
                          ]);
                         
                        ?>
                </div>
            <div class="clearfix"></div>
            <div class="col-md-6">
                     
                     <?php 
                                  
                        $label = "แผงวลจร DTMF";
                        $varName = 'var_form01_dtmfdogsub1zimcardbattery_pcccsdldfsfccvvvxkd00fffgdsseee_6';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_dtmfdogsub1zimcard_pccsdlsdfvvbbvvvccccf6sdfsf_ortherdf';
                        $suffixOther = '';
                        $items="container";
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
            <div class="col-md-6">
                     
                     <?php 
                                  
                        $label = "แผงวลจร";
                        $varName = 'var_form01_dtmfdogsudddfffb1zimcardbattery_pcccsdldfsfccvvvxkd00fffgdsseee_6';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_dtmfdogsubdddfff1zimcard_pccsdlsdfvvbbvvvccccf6sdfsf_ortherdf';
                        $suffixOther = '';
                        $items="container";
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
            <div class="col-md-6">
                     
                     <?php 
                                  
                        $label = "สายไฟวงจร";
                        $varName = 'var_form01_dtmfdsdadfeogs222udddfffb1zimcardbattery_pcccsdldfsfccvvvxkd00fffgdsseee_6';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_dtmfdofff111gsubdddfff1zimcard_pccsdlsdfvvbbvvvccccf6sdfsf_ortherdf';
                        $suffixOther = '';
                        $items="container";
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
            <div class="col-md-6">
                     
                     <?php 
                                  
                        $label = "กล่องบรรจุวงจร";
                        $varName = 'var_form01_dtmfdsdadboxfeogs222udddfffb1zimcardbattery_pcccsdldfsfccvvvxkd00fffgdsseee_6';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_dtmfbboxofff111gsubdddfff1zimcard_pccsdlsdfvvbbvvvccccf6sdfsf_ortherdf';
                        $suffixOther = '';
                        $items="container";
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
            <div class="col-md-6">
                     
                     <?php 
                                  
                        $label = "นาฬิกา";
                        $varName = 'var_form01_clock_dtmfdsdadboxfeogs222udddfffb1zimcardbattery_pcccsdldfsfccvvvxkd00fffgdsseee_6';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_clock_dtmfbboxofff111gsubdddfff1zimcard_pccsdlsdfvvbbvvvccccf6sdfsf_ortherdf';
                        $suffixOther = '';
                        $items="container";
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
            
            <div class="col-md-6">
                     
                     <?php 
                                  
                        $label = "กระเดื่อง";
                        $varName = 'var_form01_clock_dpmssss001';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_clock_dtmfdpmssss001';
                        $suffixOther = '';
                        $items="container";
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
            
             <div class="col-md-6">
                     
                     <?php 
                                  
                        $label = "สลักนิรภัย";
                        $varName = 'var_form01_slugclock_dpmssss001';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_clock_dtmfdpmssss001';
                        $suffixOther = '';
                        $items="container";
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
            
            <div class="col-md-6">
                     
                     <?php 
                                  
                        $label = "อื่นๆ";
                        $varName = 'var_form01_slugcloddck_dpmssdsss001';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                        $varNameOther = 'var_form01_clocdddkevkk_dtmfdpmssss001';
                        $suffixOther = '';
                        $items="container";
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
            
            
            <div class="clearfix"></div>
            <div class="col-md-12">
                <?php

                     
                      $label = "คราบสีแดงคล้ายโรหิต";
                      $varName = 'var_form01_sub1_sheaderstextbox_0001';
                      $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                      echo $this->render("../template/text.php", [
                      'varName' => $varName,
                      'label' => $label,
                      'value' => $value,
                      ]);
                      
                    ?>
            </div>
            
            <div class="col-md-12">
                <div class="form-group">
                    <?php
                    $label = 'ทดสอบด้วยชุดทดสอบคราบโลหิตเบื้องต้น';
                    $varName = 'var_conditioddffn_Blood_baba';
                    $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;

                    $varNameOther = 'var_check_otherSDfdsffdfffddddd';
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
                            $varName = 'var_hemastxx2';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                            $varNameOther = 'var_check_other23ddddssdf';
                            $suffixOther = '';

                            $options = [
                                'inline' => FALSE,
                                'label' => $label,
                                'other' => [
                                    'attribute' => "Notify[content][$varNameOther][value]",
                                    'value' => isset($data['content'][$varNameOther]['value']) ? $data['content'][$varNameOther]['value'] : '',
                                    'suffix' => $suffixOther,
                                ],
                            ];
                            ?>
                            <?= EzformWidget::checkbox("Notify[content][$varName][value]", $value, $options) ?>

                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varNameOther][suffix]", $suffixOther) ?>
                        </div>
                        <div class="col-md-8">
                            <?php
                            $label = '';
                            $varName = 'var_demo_bloodsd2';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                            $items = [
                                'data' => CoreFunc::itemAlias('demo_blood'),
                            ];
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::radioList("Notify[content][$varName][value]", $value, $items, ['inline' => true]) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                 </div>
                
                <div class="col-md-12">
            <div class="col-md-4">
                 <?php
                $label = 'Phenolpatnaeain';
                $varName = 'var_phenolpatnaeain32';
                $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;

                $varNameOther = 'var_phenolpatnaeain_check_other23';
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
                        $varName = 'var_phenolpatnaeain_item32';
                        $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;

                        $items = [
                            'data'=>CoreFunc::itemAlias('demo_blood'),
                        ];
                        ?>
                        <?= EzformWidget::label($label)?>
                        <?= EzformWidget::radioList("Notify[content][$varName][value]", $value, $items, ['inline'=>true])?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
               </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                 <?php
                $label = 'เส้นผม/เส้นขน';
                $varName = 'var_hairline_1323';
                $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;

                $varNameOther = 'var_var_hairline_check_other_1333';
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
                $varName = 'var_hairline_fiber_41';
                $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;

                $varNameOther = 'var_hairline_check_other_15';
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
                $label = 'วัตถุพยานอื่นๆ';
                $varName = 'other_witnesses_1ddf';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                ?>
                <?= EzformWidget::label($label) ?>
                <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
            </div>
         </div>
                <div class="col-md-12">
                    <br>
                    <b>การดำเนินการเกี่ยวกับวัตถุพยาน</b>
                    <div class="clearfix margin-top"></div>
                    <div class="col-md-12 ">
                        <div class="col-md-6">
                            <?php
                            $label = 'วัตถุพยานด้านสารพันธุกรรม';
                            $varName = 'other_witnesses_1dsffddsdfdfys';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                            $label = 'วัตถุพยานด้านลายนิ้วมือ/ฝ่ามือ/ฝ่าเท้าแฝง';
                            $varName = 'other_witnesses_1dsffdddfdsfsdwqq22fdfys';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                    </div>
                    
                    
                    
                    <div class="col-md-12 ">
                        <div class="col-md-6">
                            <?php
                            $label = 'วัตถุพยานด้านร่องรอยข้างต้น';
                            $varName = 'other_witnesses_1dsffddfff343ddfdsfsdwqq22fdfys';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                        
                        <div class="col-md-6">
                            <?php
                            $label = 'วัตถุพยานด้านระเบิด';
                            $varName = 'other_witnesses_1dsffddfff343ddfdsbommmfsdwqq22fdfys';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                        
                        <div class="col-md-6">
                            <?php
                            $label = 'สารประกอบของวัตถุระเบิด';
                            $varName = 'other_witnesses_1dsffddfff34dfsdfddd1113ddfdsbommmfsdwqq22fdfys';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                        
                        <div class="col-md-6">
                            <?php
                            $label = 'อื่นๆ';
                            $varName = 'other_witnesses_ortherssdfdsf1dsffddfff34dfsdfddd1113ddfdsbommmfsdwqq22fdfys';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12">
                             
                            <?php
                            
                              $label = "การตรวจสอบครั้งสุดท้าย";
                              $varName = 'var_form01_sub1_checkbox_outside_1sdf_footer';
                              $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                              $varNameOther = 'var_form01_sub1_radio_other_tool1';
                              $suffixOther = '';

                              echo $this->render("../template/checkbox.php", [
                              'varName' => $varName,
                              'label' => $label,
                              'value' => $value,
                              'varNameOther' => $varNameOther,
                              'suffixOther' => $suffixOther,
                               
                              ]);

                             
                            ?>
                            
                        </div>
                        
                        <div class="col-md-12">
                             
                            <?php
                            
                              $label = "การตรวจเก็บวัตถุพยานครบถ้วน";
                              $varName = 'var_form01_sub1_checkbox_outside_full_1sdf_footer';
                              $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                              $varNameOther = 'var_form01_sub1_radio_other_tool1ffuull';
                              $suffixOther = '';

                              echo $this->render("../template/checkbox.php", [
                              'varName' => $varName,
                              'label' => $label,
                              'value' => $value,
                              'varNameOther' => $varNameOther,
                              'suffixOther' => $suffixOther,
                               
                              ]);

                             
                            ?>
                            
                        </div>
                        
                        <div class="col-md-12">
                             
                            <?php
                            
                              $label = "ถ่ายภาพสถานที่เกิดเหตุ และดำเนินการส่งมอบสถานที่เกิดเหตุให้แก่พนักงานสอบสวน";
                              $varName = 'var_form01_sub1_checkbox_outside_full_1sdf_footersdfsdrrr';
                              $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                              $varNameOther = 'var_form01_sub1_radio_otdsfsfher_tool1ffuull';
                              $suffixOther = '';

                              echo $this->render("../template/checkbox.php", [
                              'varName' => $varName,
                              'label' => $label,
                              'value' => $value,
                              'varNameOther' => $varNameOther,
                              'suffixOther' => $suffixOther,
                               
                              ]);

                             
                            ?>
                            
                        </div>
                        
                    </div>
                </div>
                  <div style="display: block;
    width: 100%;
    padding: 0;
    margin-bottom: 20px;
    font-size: 21px;
    line-height: inherit;
    color: #333;
    border: 0;
    border-bottom: 1px solid #e5e5e5;
    margin-left: -42px;">8.การส่งมอบสถานที่เกิดเหตุ</div>       
                <div class="col-md-12"><br>
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                         <div>
                            <?php
                            $label = "วันที่ทำการตรวจสอบสถานที่เกิดเหตุเสร็จ";
                            $varName = 'var_form03_sub1_date_10gg';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';

                            echo $this->render("../template/datepicker.php", [
                                'varName' => $varName,
                                'label' => $label,
                                'value' => $value,
                            ]);
                            ?>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12"><br>
                    
                    <div class="col-md-12">
                        <div class="col-md-6"></div>
                         <div class="col-md-6">
                             <div class="text-center" style="text-align: center;margin-bottom:20px;"><b>การส่งมอบสถานที่เกิดเหตุ</b></div>
                            <div class="clearfix"></div>
                            <?php
                            $label = 'ลงชื่อ (ผู้รับมอบสถานที่เกิดเหตุ)';
                            $varName = 'other_witnesses_1dsffddfff343ddfdsbommmfsdwqq22fdfys_yournames';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6"></div>
                         <div class="col-md-6">
                            <?php
                            $label = 'ตำแหน่ง';
                            $varName = 'other_witnesses_1dsffddfff343ddfdsbommmfsdwqq22fdfys_youtpositions';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                    </div>
                    <br>
                    
                    <div class="col-md-12" style="margin-top:20px;">
                        <div class="col-md-6"></div>
                         <div class="col-md-6">
                            <?php
                            $label = 'ลงชื่อ (ผู้รับมอบสถานที่เกิดเหตุ)';
                            $varName = 'other_witnesses_1dsffddfff343ddfdsbommmfsdwqq22fdfys_yournames2';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6"></div>
                         <div class="col-md-6">
                            <?php
                            $label = 'ตำแหน่ง';
                            $varName = 'other_witnesses_1dsffddfff343ddfdsbommmfsdwqq22fdfys_youtpositions2';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                    </div>
                </div>
                
            </div>
            </div>
        </div>
    </fieldset>
</div>





<style>
    fieldset{margin-left:20px;}
    .label-center-input{margin-top: 30px;}
    .margin-top{margin-top:10px;}
</style>