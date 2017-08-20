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
                $varName = 'var_form04_radio_tool_1';
                $varNameOther = 'var_form04_radio_tool_other_1';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                
               
                $suffixOther = '';
                $items = 'asset_case_type';

                echo $this->render("../template/radio.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                    'varNameOther' => $varNameOther,
                    'suffixOther' => $suffixOther,
                    'items' => $items,
                    'number' => 4,
                    //'data'=>$data
                    
                ]);
                ?>

            </div>
            <div class="col-md-4">
                <?php
                $label = "วันที่";
                $varName = 'var_form04_sub1_date_1';
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
                $varName = 'var_form04_radio_notification_1';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                $varNameOther = 'var_form04_orther_radio_notification_1';
                $suffixOther = '';
                $items = '_form1_sub_notification_01';

                echo $this->render("../template/radio.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                    'varNameOther' => $varNameOther,
                    'suffixOther' => $suffixOther,
                    'items' => $items,
                    'number' => 5,
                    'data'=>$data
                ]);
                ?>
            </div>

            <div class="col-md-6">
                <?php
                $label = "พนักงานสอบสวน";
                $varName = 'var_form04_sub1_textbox_outside_0001';
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
                $label = "หมายเลขโทรศัพท์";
                $varName = 'var_form04_sub1_textbox_phone_0001';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
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
                <div class="col-md-12">
                    <?php
                    $label = "สถานที่เกิดเหตุ";
                    $varName = 'var_form04_sub1_textbox_homess_0001';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                    echo $this->render("../template/text.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                    ]);
                    ?>
                </div>     
                <div class="col-md-8 margin-top">
                    <?php
                    $label = "ผู้เสียชีวิตชื่อ";
                    $varName = 'var_form02_sub1_textbox_fullname_111';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                    echo $this->render("../template/text.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                    ]);
                    ?>
                </div>
                <div class="col-md-4 margin-top">
                    <?php
                    $label = "อายุประมาณ (ปี)";
                    $varName = 'var_form02_sub1_textbox_fullname_112_age';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                    echo $this->render("../template/text.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                    ]);
                    ?>
                </div>

                <div class="col-md-8">
                    <?php
                    $label = "ชื่อ";
                    $varName = 'var_form02_sub1_textbox_fullname_0113';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                    echo $this->render("../template/text.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                    ]);
                    ?>
                </div>
                <div class="col-md-4">
                    <?php
                    $label = "อายุประมาณ (ปี)";
                    $varName = 'var_form02_sub1_textbox_fullname_114_age';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                    echo $this->render("../template/text.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                    ]);
                    ?>
                </div>

                <div class="col-md-8 margin-top">
                    <?php
                    $label = "ผู้บาดเจ็บชื่อ";
                    $varName = 'var_form02_sub1_textbox_fullname_115';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                    echo $this->render("../template/text.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                    ]);
                    ?>
                </div>
                <div class="col-md-4 margin-top">
                    <?php
                    $label = "อายุประมาณ (ปี)";
                    $varName = 'var_form02_sub1_textbox_fullname_116_age';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                    echo $this->render("../template/text.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                    ]);
                    ?>
                </div>




                <div class="col-md-8">
                    <?php
                    $label = "ชื่อ";
                    $varName = 'var_form01_sub1_textbox_fullname_117';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
                    echo $this->render("../template/text.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                    ]);
                    ?>
                </div>
                <div class="col-md-4">
                    <?php
                    $label = "อายุประมาณ (ปี)";
                    $varName = 'var_form01_sub1_textbox_age_118';
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
</div>    

<br>

<div class="row"> 
    <fieldset>
        <legend>3.วันเวลาที่พนักงานสอบสวน/ผู้เสียหาย ทราบสาเหตุ/เกิดเหตุ</legend>
        <div class="col-md-12">
            <div class="col-md-6">
                <?php
                $label = "วันที่";
                $varName = 'var_form03_sub2_date_v2_2';
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
                $varName = 'var_form03_sub2_date_v2_2_dfssdfsfsdf';
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
            <?php for ($i = 1; $i <= 9; $i++): ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <?php
                        $label = '5.'.$i;
                        $varName = 'var_form300_check_' . $i;
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
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
        <div class="col-md-12">
            <b>สภาพสถานที่เกิดเหตุเมื่อไปถึง</b><br>
            <div class="col-md-6">
                <?php
                $label = "การรักษาสถานที่เกิดเหตุ";
                $varName = 'var_form301_sub1_radio_have_v2_1';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                $varNameOther = 'var_form00301_sub1_radio_other_have_v2_1';
                $suffixOther = '';
                $items = '_have';

                echo $this->render("../template/radio.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                    'varNameOther' => $varNameOther,
                    'suffixOther' => $suffixOther,
                    'items' => $items,
                    'number' => 2,
                    'data'=>$data
                ]);
                ?>
            </div>
            <div class="col-md-6">
                <?php
                $label = "แสงสว่าง(ที่สังเกตเห็น)";
                $varName = 'var_form00k302_sub1_radio_lighting_v2_1';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                $varNameOther = 'var_form00f302_sub1_radio_other_lighting_v2_1';
                $suffixOther = '';
                $items = 'lighting';

                echo $this->render("../template/radio.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                    'varNameOther' => $varNameOther,
                    'suffixOther' => $suffixOther,
                    'items' => $items,
                    'number' => 4,
                    'data'=>$data
                ]);
                ?>
            </div>

            <div class="col-md-6">
                <?php
                $label = "อุณหภูมิ";
                $varName = 'var_formdsfd303_sub1_radio_temperature_v2_1';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                $varNameOther = 'var_formddd303_sub1_radio_other_temperature_v2_1';
                $suffixOther = '';
                $items = 'temperature';

                echo $this->render("../template/radio.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                    'varNameOther' => $varNameOther,
                    'suffixOther' => $suffixOther,
                    'items' => $items,
                    'number' => 4,
                    'data'=>$data
                ]);
                ?>
            </div>
            <div class="col-md-6">
                <?php
                $label = "กลิ่น";
                $varName = 'var_formad304_sub1_radio_smell_v2_1';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                $varNameOther = 'var_formas304_sub1_radio_other_smell_v2_1';
                $suffixOther = '';
                $items = '_have';

                echo $this->render("../template/radio.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                    'varNameOther' => $varNameOther,
                    'suffixOther' => $suffixOther,
                    'items' => $items,
                    'number' => 2,
                    'data'=>$data
                ]);
                ?>
            </div>
            <br>
            
            <div class="col-md-12">
                <div><b>ลักษณะสถานที่เกิดเหตุ</b></div><br>
                <div class="col-md-12">
                    <?php
                    $label = "กรณีเกิดเหตุภายนอกอาคาร";
                    $varName = 'var_formddfc305_sub1_radio_outroom_v2_1';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                    $varNameOther = 'var_formds305_sub1_radio_other_outroom_v2_1';
                    $suffixOther = '';
                    $items = 'outdoors';

                    echo $this->render("../template/radio.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'varNameOther' => $varNameOther,
                        'suffixOther' => $suffixOther,
                        'items' => $items,
                        'number' => 5,
                        'data'=>$data
                    ]);
                    ?>
                </div>
            </div>



            <div class="col-md-12">
                <div class="col-md-12">

                    <div class="col-md-12">
                        <div class="form-group">
                            <?php
                            $label = "สภาพบริเวณ เมื่อหันหน้าเข้า";
                            $varName = 'var_form306_sub1_checkboxs_outside_0001';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form306_sub1_checkboxs_outside_0001';
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
                            $varName = 'var_form307_sub1_checkbox_outside_0001';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form307_sub1_radio_other_outside_0001';
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
                            $varName = 'var_form308_sub1_checkbox_outside_0002';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form308_sub1_radio_other_outside_0002';
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
                            $varName = 'var_form309_sub1_checkbox_outside_0003';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form309_sub1_radio_other_outside_0003';
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
                            $varName = 'var_form310_sub1_checkbox_outside_0004';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form310_sub1_radio_other_outside_0004';
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
                    
                    <br>
                    <div><b>กรณีเกิดเหตุภายในอาคาร</b></div><br>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <?php
                            $label = "ลักษณะภายนอก";
                            $varName = 'var_form310_sub1_radio_roomsmes_v2_1';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form310_sub1_radio_other_roomsmes_v2_1';
                            $suffixOther = '';
                            $items = 'rooms';

                            echo $this->render("../template/radio.php", [
                                'varName' => $varName,
                                'label' => $label,
                                'value' => $value,
                                'varNameOther' => $varNameOther,
                                'suffixOther' => $suffixOther,
                                'items' => $items,
                                'number' => 3,
                                'data'=>$data
                            ]);
                            ?>
                        </div>
                        
                        <div class="col-md-6">
                    <div class="form-group">
                        <?php
                        $label = 'สภาพปริเวณโดยรอบ';
                        $varName = 'var_form311_sub1_fence_0001';
                        $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;
                         
                             
                              $varNameOther = 'var_form311_sub1_fence_other_0001';
                              $suffixOther = '';
                              $items = 'fence';

                              echo $this->render("../template/radio.php", [
                              'varName' => $varName,
                              'label' => $label,
                              'value' => $value,
                              'varNameOther' => $varNameOther,
                              'suffixOther' => $suffixOther,
                              'items' => $items,
                              'number' => 10,
                                  'data'=>$data
                              ]); 
                        ?>
                        
                    </div></div>
                            <div class="clearfix"></div>
                     <div class="col-md-12">
                         <div class="col-md-12">
                             <div class="form-group">
                            <?php
                            $label = "เมื่อหันหน้าเข้า";
                            $varName = 'var_form312_sub1_textbox_Surroundin_gconditions_00001';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form312_sub1_textbox_Surroundin_gconditions_other_00001';
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
                            $varName = 'var_form313_sub1_textbox_Surroundin_gconditions_00002';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form313_sub1_textbox_Surroundin_gconditions_other_00002';
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
                            $varName = 'var_form314_sub1_textbox_Surroundin_gconditions_00003';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form314_sub1_textbox_Surroundin_gconditions_other_00003';
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
                            $varName = 'var_form315_sub1_textbox_Surroundin_gconditions_00004';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form315_sub1_textbox_Surroundin_gconditions_other_00004';
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
                            $varName = 'var_form316_sub1_textbox_Surroundin_gconditions_00005';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form316_sub1_textbox_Surroundin_gconditions_other_00005';
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
                        $varName = 'var_form022_sub1_textbox_outside_00001';
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
                        $varName = 'var_form022f_sub1_textbox_outside_00002';
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


            <div class="col-md-12"><div class="clearfix"></div>
                <b>โครงสร้างของสถานที่เกิดเหตุ</b>
                <div class="clearfix margin-top"></div>
                <div class="col-md-6 ">
                    <?php
                    $label = "มีความกว้าง X ยาวประมาณ (ซม.)";
                    $varName = 'var_form022dd_width_001';
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
                    $varName = 'var_form02222ff_creates_001';
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
$varName = 'var_form0222eee_creates2_001';
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
$varName = 'var_form02rrrr_sub1_textbox_Surroundin_gconditions_0000002';
$value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
$varNameOther = 'var_form03_sub1_textbox_Surroundin_gconditions_other_000000rrr22';
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
$varName = 'var_form02r4_sub1_textbox_Surroundin_gconditions_00000022rr';
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
$varName = 'var_form02trd_sub1_textbox_Surroundin_gconditions_0000004';
$value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
$varNameOther = 'var_form02_sub1_textbox_Surroundin_gconditions_other_000000ff';
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
$varName = 'var_form02c_sub1_textbox_Surroundin_gconditions_0000005';
$value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
$varNameOther = 'var_form02cc_sub1_textbox_Surroundin_gconditions_other_0000005';
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
$varName = 'var_form02we2_creates2_000001';
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
                    $varName = 'var_form02rr_creates2_00000001';
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
                    $varName = 'var_form02tr_creates2_000000dd01';
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
                    $varName = 'var_form02dd_creates2_0000sdf0dd01';
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
                    $label = "ทางเข้าทางออก";
                    $varName = 'var_form315_creates2_0000sdf0dd01';
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
            <div class="col-md-12 margin-top">
                <div class="col-md-6">

                    <?php
                    $label = "ร่องรอยการต่อสู้";
                    $varName = 'var_form02jh_sub1_body_00000000001';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                    $varNameOther = 'var_form02_sub1_body_other_00000000001';
                    $suffixOther = '';
                    $items = '_have';

                    echo $this->render("../template/radio.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'varNameOther' => $varNameOther,
                        'suffixOther' => $suffixOther,
                        'items' => $items,
                        'number' => 3,
                        'data'=>$data
                    ]);
                    ?>
                </div>
                <div class="col-md-6">

                    <?php
                    $label = "ร่องรอยการรื้อค้น";
                    $varName = 'var_form316_sub1_body_00000000001';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                    $varNameOther = 'var_form02_sub1_body_other_00000000001';
                    $suffixOther = '';
                    $items = '_have';

                    echo $this->render("../template/radio.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'varNameOther' => $varNameOther,
                        'suffixOther' => $suffixOther,
                        'items' => $items,
                        'number' => 3,
                        'data'=>$data
                    ]);
                    ?>
                </div>
            </div>
<div class="col-md-12 margin-top">
    <div class="col-md-12">

        <?php
        $label = "ศพ";
        $varName = 'var_form317_sub1_body_00000000001';
        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
        $varNameOther = 'var_form317_sub1_body_other_00000000001';
        $suffixOther = '';
        $items = 'body';

        echo $this->render("../template/radio.php", [
            'varName' => $varName,
            'label' => $label,
            'value' => $value,
            'varNameOther' => $varNameOther,
            'suffixOther' => $suffixOther,
            'items' => $items,
            'number' => 3,
            'data'=>$data
        ]);
        ?>
    </div>
</div>



            <div class="col-md-12 margin-top">
                <div class="col-md-12">
                    <?php
                    $label = "สภาพศพ";
                    $varName = 'var_form02d32_sub1_body_textbox_000000000001';
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
            <div class="col-md-12 margin-top">
                <div class="col-md-12">
                    <?php
                    $label = "การแต่งกายและทรัพย์สิน";
                    $varName = 'var_form02rd_sub1_radio_the_dress';
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
                        'number' => 6,
                        'data'=>$data
                    ]);
                    ?>
                </div>
            </div>

            <br>
            <div class="col-md-12 margin-top">
                <div class="col-md-12">
                    <?php
                    $label = "สภาพรอยบาดแผลเบื้องต้น";
                    $varName = 'var_form02fgd_sub1_radio_the_dress200000';
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
                        'number' => 2,
                        'data'=>$data
                    ]);
                    ?>
                </div>
            </div>

            <br>
            <div class="col-md-12 margin-top">
                <div class="col-md-12">
                    <?php
                    $label = "ลักษณะบาดแผลคือ";
                    $varName = 'var_form02wsq_sub1_body_textbox_000000099880000001';
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
//                    $label = "ความเสียหาย (บ้านเรือน ยานพาหนะ ทรัพย์สิน)";
//                    $varName = 'var_form012ew_sub1_body_textbox_00000009909876880000001';
//                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : "";
//                    echo $this->render("../template/textarea.php", [
//                        'varName' => $varName,
//                        'label' => $label,
//                        'value' => $value,
//                    ]);
                    ?>
                </div>
            </div>

            <br>
            <div class="col-md-12 "> 
                <div><b>วัตถุพยานที่ตรวจพบ</b></div>
                <div class="col-md-12 margin-top">
                    <?php
                    $label = "คราบสีแดงคล้ายโรหิต";
                    $varName = 'var_form317_sub1_body_textbox_00000009909876880000001';
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
               

            <div class="col-md-12">
      
                <div class="col-md-12">
                    <div class="form-group">
                    <?php
                    $label = 'ทดสอบด้วยชุดทดสอบคราบโลหิตเบื้องต้น';
                    $varName = 'var_conditioddffn203_Blood_baba';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                    $varNameOther = 'var_check203_otherSDfdsffdfffddddd';
                    $suffixOther = 'หน่วย';

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

                    <div class="col-md-12">
                        <div class="col-md-4">
                    <?php
                    $label = 'Hemastx';
                    $varName = 'var_hemastxx204';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                    $varNameOther = 'var_check_other23ddddssdf204';
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
                    $varName = 'var_demo_bloodsd205';
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
                    $varName = 'var_phenolpatnaeain206';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                    $varNameOther = 'var_phenolpatnaeain_check_other207';
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

                            <? EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
<?= EzformWidget::hiddenInput("Notify[content][$varNameOther][suffix]", $suffixOther) ?>
                        </div>
                        <div class="col-md-8">
                            <?php
                            $label = '';
                            $varName = 'var_phenolpatnaeain_item208';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                            $items = [
                                'data' => CoreFunc::itemAlias('demo_blood'),
                            ];
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::radioList("Notify[content][$varName][value]", $value, $items, ['inline' => true]) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-6">
                            <?php
                            $label = 'เส้นผม/เส้นขน';
                            $varName = 'var_hairline_1323209';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                            $varNameOther = 'var_var_hairline_check_other_210';
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

                            <? EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varNameOther][suffix]", $suffixOther) ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                            $label = 'เส้นใย';
                            $varName = 'var_hairline_fiber_211';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                            $varNameOther = 'var_hairline_check_other_21';
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

                            <? EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varNameOther][suffix]", $suffixOther) ?>
                        </div>
                         
                         <div class="col-md-6">
                            <?php
                            $label = 'ปลอกกระสุนปืน';
                            $varName = 'var_hairline318_fiber_211';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                            $varNameOther = 'var_hairline_check_other_21';
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

                            <? EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varNameOther][suffix]", $suffixOther) ?>
                        </div>
                        
                        <div class="col-md-6">
                            <?php
                            $label = 'หัวกระสุนปืน';
                            $varName = 'var_hairline319_fiber_211';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                            $varNameOther = 'var_hairline_check_other_21';
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

                            <? EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varNameOther][suffix]", $suffixOther) ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                            $label = 'วัตถุพยานอื่นๆ';
                            $varName = 'var_hairline320_fiber_211';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                            $varNameOther = 'var_hairline_check_other_21';
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

                            <? EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varNameOther][suffix]", $suffixOther) ?>
                        </div>
                        
                        <div class="col-md-6">
                            <?php
                            $label = 'วัตถุพยานที่ตรวจเก็บ';
                            $varName = 'other_witnesses321_1dsffddsdfdfys213';
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
                        <div class="clearfix"></div>
                        <div class="col-md-12">
                            <div class="col-md-12">
                        <?php
                        $label = '';
                        $varName = 'other_witnesses_1dsffddsdfdfys213';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                            </div>
                        </div>

                       

                        <div class="col-md-12 margin-top">
                           
                            <div class="clearfix"></div>
                            <div class="col-md-12">

                            <?php
                            $label = "การตรวจสอบครั้งสุดท้าย";
                            $varName = 'var_form01_sub1_218checkbox_outside_1sdf_footer';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form01_sub218_radio_other_tool1';
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
                            $varName = 'var_form01_sub1_219checkbox_outside_full_1sdf_footer';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                            $varNameOther = 'var_form01_sub219_radio_other_tool1ffuull';
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
                            $varName = 'var_form220_sub1_checkbox_outside_full_1sdf_footersdfsdrrr';
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
                            $varName = 'var_form234_sub1_date_10gg';
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
                                $varName = 'other_witnesses_1dsff230';
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
                                $varName = 'other_witnesses_1dsffddf231';
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
                                $varName = 'other_witnesses_1dsf232';
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
$varName = 'other_witnesses_1ds233';
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
    .margin-top{    margin-top: 15px;}
</style>