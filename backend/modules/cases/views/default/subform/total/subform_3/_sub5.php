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
        <?= EzformWidget::label("1.การรับแจ้งเหตุ")?>
        <div class="col-md-12">
            <div class="col-md-4">
                <?php $label = 'เมื่อวันที่'; ?>
                <label><?= $label; ?></label>
                <?php
                $varName = 'var_form05_sub5_date15';
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
                 
            </div>
            <div class="col-md-4">
                <?php 
                    $label = "เวลาโดยประมาณ (น.)";
                    $varName = 'Notify[content][var_form03_sub5_time_1][value]';
                    $vname = "var_form03_sub5_time_1";
                    $value = isset($data['content'][$vname]['value']) ? $data['content'][$vname]['value'] : '';


                    echo $this->render("../template/timpicker.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'vname' => $vname
                    ]);
                ?>
                <!--<input type="text" class="form-control" name="Notify[content][_form1_sub_notification_01_date1][value]" value="<?= $value; ?>">-->
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?php
                    $label = 'ตามประจำวันข้อที่';
                    $varName = 'var_form03_sub5_routine1';
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
                    $label = 'กสก. พฐก./';
                    $varName = 'var_form03_sub5_pst1';
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
                    $label = 'กสก./ศพฐ';
                    $varName = 'var_form03_sub5_pst_new1';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';

                    echo $this->render("../template/text.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                    ]);
                    ?>
                     
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?php
                    $label = ' พฐ.จว.';
                    $varName = 'var_form03_sub5_pst1';
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
                    $label = 'ได้รับแจ้งตามหนังสือ/ทางโทรศัพท์';
                    $varName = 'var_form03_sub5_book_phone1';
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
                    $label = 'จาก สน./สภ.';
                    $varName = 'var_form03_sub5_snsp1';
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
                        $label = 'ขอเจ้าหน้าที่ร่วมตรวจสถานที่เกิดเหตุคดีเกี่ยวกับระเบิดโดยมี (เป็นพนักงานสอบสวนเจ้าของคดี)';
                        $varName = 'var_form03_sub5_aitc1';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
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


<div class="row">
    <fieldset>
        <?= EzformWidget::label("2.สถานที่เกิดเหตุ")?>
        <div class="col-md-12">
            <div class="col-md-5">
                <div class="form-group">
                    <?php
                    $label = 'สถานที่เกิดเหตุ';
                    $varName = 'var_form03_sub5_the_accident_location';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                    ?>
                    <?= EzformWidget::label($label) ?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <?php
                    $label = 'ผู้เสียชีวิต/ผู้บาดเจ็บ/ผู้เสียหาย';
                    $varName = 'var_form03_sub5_house_owner1';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                    ?>
                    <?= EzformWidget::label($label) ?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <?php
                    $label = 'อายุประมาณ(ปี)';
                    $varName = 'var_form03_sub5_house_owner_age1';
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


<div class="row">
    <fieldset>
        <?= EzformWidget::label("3.วันเวลาที่ทราบเหตุ/เกิดเหตุ")?>
        <div class="col-md-12">
            <div class="col-md-5">
                <div class="form-group">
                    <?php
                    $label = 'พนักงานสอบสวน/ผู้เสียหาย ทราบเหตุ / เกิดเหตุ เมื่อวันที่ ';
                    ?>
                    <label><?= $label; ?></label>
                    <?php
                    $varName = 'var_form03_sub5_date2';
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
                </div>
            </div>
            <div class="col-md-5">
                <?php 
                    $label = "เวลาโดยประมาณ (น.)";
                    $varName = 'Notify[content][var_form03_sub5_time_5][value]';
                    $vname = "var_form03_sub5_time_5";
                    $value = isset($data['content'][$vname]['value']) ? $data['content'][$vname]['value'] : '';


                    echo $this->render("../template/timpicker.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'vname' => $vname
                    ]);
                ?>
            </div>

        </div>
    </fieldset>
</div>

<div class="row">
    <fieldset>
        <?= EzformWidget::label("4.วันเวลาตรวจสถานที่เกิดเหตุ")?>
        <div class="col-md-12">
            <div class="col-md-5">
                <div class="form-group">
                    <?php
                    $label = 'ตรวจสถานที่เกิดเหตุเมื่อวันที่ ';
                    ?>
                    <label><?= $label; ?></label>
                    <?php
                    $varName = 'var_form05_sub5_date3';
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
                </div>
            </div>
            <div class="col-md-5">
                <?php 
                    $label = "เวลาโดยประมาณ (น.)";
                    $varName = 'Notify[content][var_form03_sub5_time_5][value]';
                    $vname = "var_form03_sub5_time_5";
                    $value = isset($data['content'][$vname]['value']) ? $data['content'][$vname]['value'] : '';


                    echo $this->render("../template/timpicker.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'vname' => $vname
                    ]);
                ?>
            </div>

            <div class="col-md-5">
                <div class="form-group">
                    <?php
                    $label = 'ตรวจสถานที่เกิดเหตุเมื่อวันที่ ';
                    ?>
                    <label><?= $label; ?></label>
                    <?php
                    $varName = 'var_form03_sub5_date5';
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
                </div>
            </div>
            <div class="col-md-5">
                 <?php 
                    $label = "เวลาโดยประมาณ (น.)";
                    $varName = 'Notify[content][var_form03_sub5_time_5][value]';
                    $vname = "var_form03_sub5_time_5";
                    $value = isset($data['content'][$vname]['value']) ? $data['content'][$vname]['value'] : '';


                    echo $this->render("../template/timpicker.php", [
                        'varName' => $varName,
                        'label' => $label,
                        'value' => $value,
                        'vname' => $vname
                    ]);
                ?>
            </div>

        </div>
    </fieldset>
</div>


<div class="row">
    <fieldset>
        <?= EzformWidget::label("5.ผู้ตรวจสถานที่เกิดเหตุ")?>
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    <?php
                        $label = '5.1';
                        $varName = 'var_form03_sub5_officer1';
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
                        $label = 'ตำแหน่ง';
                        $varName = 'var_form03_sub5_position1';
                        $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
                    ?>
                    <?= EzformWidget::label($label)?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    <?php
                        $label = '5.2';
                        $varName = 'var_form03content_sub5_officer2';
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
                        $label = 'ตำแหน่ง';
                        $varName = 'var_form03_sub5_position2';
                        $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
                    ?>
                    <?= EzformWidget::label($label)?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    <?php
                        $label = '5.3';
                        $varName = 'var_form03_sub5_officer3';
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
                        $label = 'ตำแหน่ง';
                        $varName = 'var_form03_sub5_position3';
                        $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
                    ?>
                    <?= EzformWidget::label($label)?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    <?php
                        $label = '5.4';
                        $varName = 'var_form03_sub5_officer4';
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
                        $label = 'ตำแหน่ง';
                        $varName = 'var_form03_sub5_position4';
                        $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
                    ?>
                    <?= EzformWidget::label($label)?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
                </div>
            </div>
        </div>
    </fieldset>
</div>


<div class="row">
    <fieldset>
        <?= EzformWidget::label("6.ลักษณะของสถานที่เกิดเหตุ")?>
       <div class="col-md-12">
                    <?php
                        $label = 'ลักษณะของสถานที่เกิดเหตุ';
                        $varName = 'var_form03_sub5_position4_templates';
                        $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
                    ?>
                    <?= EzformWidget::label($label)?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
                </div>
    </fieldset>
</div>


<div class="row margin-top">
    <fieldset>
        <?= EzformWidget::label("7.ผลการตรวจสถานที่เกิดเหตุ")?>
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="form-group">
                    <?php
                    $label = 'พฤติการณ์ของคดี จากการสอบถามข้อมูลในเบื้องต้นจาก พงส. ได้ความว่า';
                    $varName = 'var_form03_sub5_textarea_output1';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                    ?>
                    <?= EzformWidget::label($label) ?>
                    <?= EzformWidget::textarea("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                </div>
            </div>
            <div class="col-md-12"><br>
                <?= EzformWidget::label("จากการตรวจสถานที่เกิดเหตุ")?>
                <div class="form-group">
                    <?php
                    $label = '7.1 สภาพของสถานที่เกิดเหตุ';
                    $varName = 'var_form03_sub5_house_owner1sdsf';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                    ?>
                    <?= EzformWidget::label($label) ?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                </div>
            </div>
            <div class="col-md-12">
                <div><?= EzformWidget::label("7.2 ลักษณะสภาพศพ")?></div>
                

                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        $label = '7.2.1 พบศพ/ไม่พบศพ';
                        $varName = 'var_form053sub3_house_owner_body001';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $label = '7.2.2 ตำแหน่งที่พบศพ';
                        $varName = 'var_form035_sub53_house_owner_body002';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $label = '7.2.3 สภาพศพ';
                        $varName = 'var_form035_sub353_house_owner_body003';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $label = '7.2.4 สภาพเครื่องแต่งกายและทรัพย์สิน';
                        $varName = 'var_form053_sub55333_house_owner_body004';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $label = '7.2.5 รอยบาดแผลที่ศพ';
                        $varName = 'var_form03333_sub5555_house_owner_body005';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                    </div>
 
                </div>
  
            </div>



            <div class="col-md-12">
                <?= EzformWidget::label("7.3 สภาพความเสียหาย")?>
                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        $label = '';
                        $varName = 'var_form033333_sub4343d_house_owner1_00003';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <?= EzformWidget::label("7.4 ร่องรอยและวัตถุพยานที่ตรวจพบในสถานที่เกิดเหตุ")?>
               <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        $label = '';
                        $varName = 'var_form03sd_sub4ged_house_owner1_0000_dsf3';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                    </div>
                </div>
            </div>
            
             <div class="col-md-12">
                <?= EzformWidget::label("7.5 วัตถุพยานที่ตรวจเก็บในสถานที่เกิดเหตุ")?>
               <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        $label = '';
                        $varName = 'var_form0dfd_sub4dsfsdfsdfsdfsdd_house_ownesdfr1_0000_dsf3sdfsd';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12">
                <?= EzformWidget::label("7.6 การดำเนินการเกี่ยวกับวัตถุพยาน")?>
               <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        $label = 'การดำเนินการเกี่ยวกับวัตถุพยาน';
                        $varName = 'var_form0333ax_sub4d3dfd_house_ownesdfr1_0000_dsf3sdfsdsdf';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12">
                <?= EzformWidget::label("7.7 เจ้าหน้าที่")?>
               <div class="col-md-12" style="margin-top:-20px;">
 
                       <div class="form-group">
                           <?php
                           $label = '';
                           $varName = 'var_radioqq__authoritieqq_360dfsdfsdf';
                           $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                           $varNameOther = 'var_radioqq__authoritieqq_360dfsdfsdf_other';
                           $suffixOther = 'หน่วย';

                           $items = [
                               'data' => CoreFunc::itemAlias("authorities_01"),
                               'other' => [
                                   3 => [
                                       'attribute' => "Notify[content][$varNameOther][value]",
                                       'value' => isset($data['content'][$varNameOther]['value']) ? $data['content'][$varNameOther]['value'] : '',
                                       'suffix' => $suffixOther,
                                   ]
                               ]
                           ];
                           ?>
                           <?= EzformWidget::label($label) ?>
                           <?= EzformWidget::radioList("Notify[content][$varName][value]", $value, $items, ['inline' => FALSE]) ?>

                           <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                           <?= EzformWidget::hiddenInput("Notify[content][$varNameOther][suffix]", $suffixOther) ?>
                       </div>
                    
                </div>
                
                <div class="col-md-12">
                    <div class="col-md-12">
                        <label>ตรวจสถานที่เกิดเหตุเสร็จสิ้นพร้อมทั้งส่งมอบสถานที่เกิดเหตุคืนให้กับพนักงานสอบสวนเจ้าของคดี</label>
                        <div class="clearfix"></div>
                        <div class="col-md-4">
                            <?php $label = 'เมื่อวันที่'; ?>
                            <label><?= $label; ?></label>
                            <?php
                            $varName = 'var_form03_sub5_date15_dsfs3';
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
                        <div class="col-md-4">
                            <?php
                            $label = "เวลาโดยประมาณ (น.)";
                            $varName = 'Notify[content][var_form03_sub5_time_5dd][value]';
                            $vname = "var_form03_sub5_time_5dd";
                            $value = isset($data['content'][$vname]['value']) ? $data['content'][$vname]['value'] : '';


                            echo $this->render("../template/timpicker.php", [
                                'varName' => $varName,
                                'label' => $label,
                                'value' => $value,
                                'vname' => $vname
                            ]);
                            ?>
                            <!--<input type="text" class="form-control" name="Notify[content][_form1_sub_notification_01_date1][value]" value="<?= $value; ?>">-->
                        </div>
                    </div> 
                </div>
            </div>
  
        </div>
    </fieldset>
</div>
<hr>
<br>
<div class="row">
    <div class="col-md-8 col-xs-8"></div>
    <div class="col-md-4 col-xs-4">
        <div class="form-group">
            <?php
            $label = 'ลงชื่อ';
            $varName = 'var_form03_tesxtbox5_cenname05';
            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
            ?>
            <?= EzformWidget::label($label) ?>
            <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-xs-8"></div>
    <div class="col-md-4 col-xs-4">
        <div class="form-group">
            <?php
            $label = '';
            $varName = 'var_form03_textb4ox5_cenname05';
            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
            ?>
            <?= EzformWidget::label($label) ?>
            <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-8 col-xs-8"></div>
    <div class="col-md-4 col-xs-4">
        <div class="form-group">
            <?php
            $label = 'ตำแหน่ง';
            $varName = 'var_form3_textbox_position05';
            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
            ?>
            <?= EzformWidget::label($label) ?>
            <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
        </div>
    </div>
</div>