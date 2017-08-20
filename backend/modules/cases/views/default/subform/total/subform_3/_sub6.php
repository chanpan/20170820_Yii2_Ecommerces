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
<div class="modal-header" style="margin-bottom: 10px;">
    <h4 class="modal-title" >คดีเกี่ยวกับทรัพย์</h4>
</div>
<div class="row">
    <fieldset>
        <?= EzformWidget::label("1.การรับแจ้งเหตุ")?>
        <div class="col-md-12">
            <div class="col-md-4">
                <?php $label = 'เมื่อวันที่'; ?>
                <label><?= $label; ?></label>
                <?php
                $varName = 'var_form01_sub3_date1';
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
                    $varName = 'Notify[content][var_form01_sub3_time_1][value]';
                    $vname = "var_form01_sub3_time_1";
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
                    $varName = 'var_form01_sub3_routine1';
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
                    $varName = 'var_form01_sub3_pst1';
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
                    $varName = 'var_form01_sub3_pst_new1';
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
                    $varName = 'var_form01_sub3_pst1';
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
                    $varName = 'var_form01_sub3_book_phone1';
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
                    $varName = 'var_form01_sub3_snsp1';
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
                        $label = 'ขอเจ้าหน้าที่ร่วมตรวจสถานที่เกิดเหตุคดีเกี่ยวกับทรัพย์โดยมี (เป็นพนักงานสอบสวนเจ้าของคดี)';
                        $varName = 'var_form01_sub3_aitc1';
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
                    $varName = 'var_form01_sub3_the_accident_location';
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
                    $label = 'เจ้าของบ้าน/ผู้เสียหาย/อื่นๆ';
                    $varName = 'var_form01_sub3_house_owner1';
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
                    $varName = 'var_form01_sub3_house_owner_age1';
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
                    $varName = 'var_form01_sub3_date2';
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
                    $varName = 'Notify[content][var_form01_sub3_time_2][value]';
                    $vname = "var_form01_sub3_time_2";
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
                    $varName = 'var_form01_sub3_date3';
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
                    $varName = 'Notify[content][var_form01_sub3_time_3][value]';
                    $vname = "var_form01_sub3_time_3";
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
                    $varName = 'var_form01_sub3_date4';
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
                    $varName = 'Notify[content][var_form01_sub3_time_4][value]';
                    $vname = "var_form01_sub3_time_4";
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
                        $varName = 'var_form01_sub3_officer1';
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
                        $varName = 'var_form01_sub3_position1';
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
                        $varName = 'var_form01_sub3_officer2';
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
                        $varName = 'var_form01_sub3_position2';
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
                        $varName = 'var_form01_sub3_officer3';
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
                        $varName = 'var_form01_sub3_position3';
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
                        $varName = 'var_form01_sub3_officer4';
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
                        $varName = 'var_form01_sub3_position4';
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
             <?= EzformWidget::label("ลักษณะภายนอก")?>
            <div class="clearfix"></div>
            <div class="col-md-6">
                <div class="form-group">
                        <?php
                        $label = 'เป็นบ้าน';
                        $varName = 'var_form01_sub3_checkbox_home1';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                        $varNameOther = 'var_check_other_form01_sub3_checkbox_home1';
                        $suffixOther = 'ชั้น';

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
            </div>
            <div class="col-md-6">
                <div class="form-group">
                        <?php
                        $label = 'ตึกแถว';
                        $varName = 'var_form01_sub3_checkbox_home2';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                        $varNameOther = 'var_check_other_form01_sub3_checkbox_home2';
                        $suffixOther = 'ชั้น';

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
            </div>

            <div class="col-md-6">
                <div class="form-group">
                        <?php
                        $label = 'อาคาร';
                        $varName = 'var_form01_sub3_checkbox_home3';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                        $varNameOther = 'var_check_other_form01_sub3_checkbox_home3';
                        $suffixOther = 'ชั้น';

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
            </div>

            <div class="col-md-6">
                <div class="form-group">
                        <?php
                        $label = 'อื่นๆ';
                        $varName = 'var_form01_sub3_checkbox_home4';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                        $varNameOther = 'var_check_other_form01_sub3_checkbox_home4';
                        $suffixOther = 'ชั้น';

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
            </div>

            <div class="clearfix"></div>
            <div class="col-md-4">
                <div class="form-group">
                    <?php
                        $label = 'จำนวน';
                        $varName = 'var_check_other_form01_sub3_textinput_num1';
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
                        $label = '';
                        $varName = 'var_check_other_form01_sub3_radio_home_unit1';
                        $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;

                        $items = [
                            'data'=>CoreFunc::itemAlias('home_unit'),
                        ];
                    ?>
                    <?= EzformWidget::label($label)?>
                    <?= EzformWidget::radioList("Notify[content][$varName][value]", $value, $items, ['inline'=>true])?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-4">
                <div class="form-group">
                    <?php
                        $label = 'ชั้นลอย';
                        $varName = 'var_check_other_form01_sub3_radio_home_class1';
                        $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;

                        $items = [
                            'data'=>CoreFunc::itemAlias('home_class1'),
                        ];
                    ?>
                    <?= EzformWidget::label($label)?>
                    <?= EzformWidget::radioList("Notify[content][$varName][value]", $value, $items, ['inline'=>true])?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <?php
                        $label = 'ดาดฟ้า';
                        $varName = 'var_check_other_form01_sub3_radio_home_class2';
                        $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;

                        $items = [
                            'data'=>CoreFunc::itemAlias('home_class2'),
                        ];
                    ?>
                    <?= EzformWidget::label($label)?>
                    <?= EzformWidget::radioList("Notify[content][$varName][value]", $value, $items, ['inline'=>true])?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?php
                        $label = 'ปลูกอยู่ในบริเวณ';
                        $varName = 'var_check_other_form01_sub3_radio_home_class3';
                        $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;

                        $items = [
                            'data'=>CoreFunc::itemAlias('home_class3'),
                        ];
                    ?>
                    <?= EzformWidget::label($label)?>
                    <?= EzformWidget::radioList("Notify[content][$varName][value]", $value, $items, ['inline'=>true])?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="col-md-6">
                <div class="form-group">
                    <?php
                    $label = 'เมื่อหันหน้าเข้า';
                    $varName = 'var_form01_sub3_textbox_front1';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                    ?>
                    <?= EzformWidget::label($label) ?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <?php
                    $label = 'ด้านหน้าติดดิน';
                    $varName = 'var_form01_sub3_textbox_front2';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                    ?>
                    <?= EzformWidget::label($label) ?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <?php
                    $label = 'ด้านซ้ายติดดิน';
                    $varName = 'var_form01_sub3_textbox_front2';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                    ?>
                    <?= EzformWidget::label($label) ?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <?php
                    $label = 'ด้านขวาติดดิน';
                    $varName = 'var_form01_sub3_textbox_front3';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                    ?>
                    <?= EzformWidget::label($label) ?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <?php
                    $label = 'ด้านหลังติดดิน';
                    $varName = 'var_form01_sub3_textbox_front4';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                    ?>
                    <?= EzformWidget::label($label) ?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                </div>
            </div>

        </div>


         <div class="col-md-12">
             <?= EzformWidget::label("ลักษณะภายใน")?>
             <div class="col-md-12">
                 <div class="form-group">
                <?php
                     $label = 'ลักษณะภายใน';
                     $varName = 'var_form01_sub3_textarea_in1';
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
                     $label = 'บริเวณที่เกิดเหตุ เกิดเหตุที่';
                     $varName = 'var_form01_sub3_textarea_in2';
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
        <?= EzformWidget::label("7.ผลการตรวจสถานที่เกิดเหตุ")?>
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="form-group">
                    <?php
                    $label = 'พฤติการณ์ของคดี';
                    $varName = 'var_form01_sub3_textarea_output1';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                    ?>
                    <?= EzformWidget::label($label) ?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                </div>
            </div>
            <div class="col-md-12">
                <?= EzformWidget::label("จากการตรวจสถานที่เกิดเหตุ")?>
                <div class="form-group">
                    <?php
                    $label = '7.1 ทางเข้าของคนร้าย';
                    $varName = 'var_form01_sub3_house_owner1';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                    ?>
                    <?= EzformWidget::label($label) ?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                </div>
            </div>
            <div class="col-md-12">
                <div><?= EzformWidget::label("7.2 คนร้ายได้เข้ามาห้องต่างๆ ดังนี้")?></div>
                

                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        $label = '7.2.1 ที่ห้อง';
                        $varName = 'var_form01_sub3_house_owner_age1';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <?php
                            $label = '7.2.1.1 ทางเข้าของคนร้าย พบ/ไม่พบรอยงัด';
                            $varName = 'var_form01_sub3_radio_home_class4_1';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                            $items = [
                                'data' => CoreFunc::itemAlias('home_class4'),
                            ];
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::radioList("Notify[content][$varName][value]", $value, $items, ['inline' => true]) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>

                        <div class="form-group">
                            <?php
                            $label = '7.2.1.2 พบรอยงัดที่';
                            $varName = 'var_form01_sub3_textarea_home_class4_2';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::textarea("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                        <div class="form-group">
                            <?php
                            $label = '7.2.1.3 พบรอยรื้อค้นที่';
                            $varName = 'var_form01_sub3_textarea_home_class4_3';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::textarea("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                        <div class="form-group">
                            <?php
                            $label = '7.2.1.4 พบวัตถุอื่นๆที่ตรวจพบ';
                            $varName = 'var_form01_sub3_textarea_home_class4_4';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::textarea("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                    </div>

                </div>


               

                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        $label = '7.2.2 ที่ห้อง';
                        $varName = 'var_form01_sub3_house_owner_age2';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textarea("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <?php
                            $label = '7.2.2.1 ทางเข้าของคนร้าย พบ/ไม่พบรอยงัด';
                            $varName = 'var_form01_sub3_radio_home_class4_2';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                            $items = [
                                'data' => CoreFunc::itemAlias('home_class4'),
                            ];
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::radioList("Notify[content][$varName][value]", $value, $items, ['inline' => true]) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>

                        <div class="form-group">
                            <?php
                            $label = '7.2.2.2 พบรอยงัดที่';
                            $varName = 'var_form01_sub3_textarea_home_class4_3';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::textarea("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                        <div class="form-group">
                            <?php
                            $label = '7.2.2.3 พบรอยรื้อค้นที่';
                            $varName = 'var_form01_sub3_textarea_home_class4_4';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::textarea("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                        <div class="form-group">
                            <?php
                            $label = '7.2.2.4 พบวัตถุอื่นๆที่ตรวจพบ';
                            $varName = 'var_form01_sub3_textarea_home_class4_5';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::textarea("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                    </div>

                </div>

                

                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        $label = '7.2.3 ที่ห้อง';
                        $varName = 'var_form01_sub3_house_owner_age3';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textarea("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <?php
                            $label = '7.2.3.1 ทางเข้าของคนร้าย พบ/ไม่พบรอยงัด';
                            $varName = 'var_form01_sub3_radio_home_class4_3';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                            $items = [
                                'data' => CoreFunc::itemAlias('home_class4'),
                            ];
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::radioList("Notify[content][$varName][value]", $value, $items, ['inline' => true]) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>

                        <div class="form-group">
                            <?php
                            $label = '7.2.3.2 พบรอยงัดที่';
                            $varName = 'var_form01_sub3_textarea_home_class4_4';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::textarea("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                        <div class="form-group">
                            <?php
                            $label = '7.2.3.3 พบรอยรื้อค้นที่';
                            $varName = 'var_form01_sub3_textarea_home_class4_5';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::textarea("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                        <div class="form-group">
                            <?php
                            $label = '7.2.3.4 พบวัตถุอื่นๆที่ตรวจพบ';
                            $varName = 'var_form01_sub3_textarea_home_class4_5';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::textarea("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                    </div>

                </div>




            </div>



            <div class="col-md-12">
                <?= EzformWidget::label("7.3 ในเบื้องต้น")?>

                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        $label = 'คำนำหน้าชื่อ';
                        $varName = 'var_form01_sub3_radio_person_title11';
                        $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;

                        $varNameOther = 'var_radio_other_person_title1';
                        $suffixOther = ' ';

                        $items = [
                            'data'=>CoreFunc::itemAlias('person_title'),
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

                    <div class="col-md-12">
                            <div class="form-group">
                                <?php
                                $label = 'ชื่อ';
                                $varName = 'var_form01_sub3_house_owner1';
                                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                                ?>
                                <?= EzformWidget::label($label) ?>
                                <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                                <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                            </div>
                        </div>

                    <div class="form-group">
                        <?php
                        $label = 'เจ้าของบ้าน/ผู้เสียหายอื่นๆ';
                        $varName = 'var_form01_sub3_radio_person_title12';
                        $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;

                        $varNameOther = 'var_radio_other_person_title2';
                        $suffixOther = ' ';

                        $items = [
                            'data'=>CoreFunc::itemAlias('person_home_001'),
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


                    </div> <br>
                    <label>แจ้งว่าคนร้ายโจรกรรมทรัพย์สินดังต่อไปนี้</label>

                    <div class="col-md-12">
                        <div class="form-group">
                            <?php
                            $label = '7.3.1';
                            $varName = 'var_textbox_other_person_title731';
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
                            $label = '7.3.2';
                            $varName = 'var_textbox_other_person_title732';
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
                            $label = '7.3.3';
                            $varName = 'var_textbox_other_person_title733';
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
                            $label = '7.3.4';
                            $varName = 'var_textbox_other_person_title734';
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
                            $label = '7.3.5';
                            $varName = 'var_textbox_other_person_title735';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                            ?>
                            <?= EzformWidget::label($label) ?>
                            <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-12">
                <?= EzformWidget::label("7.4 วัตถุพยานที่ตรวจเก็บในสถานที่เกิดเหตุ")?>
                <div class="col-md-12">
                    <?= EzformWidget::label("7.4.1 ตรวจเก็บลายนิ้วมือแฝง/ฝ่ามือเท้า/ฝ่ามือแฝง    ")?>
                    <div class="form-group">
                        <?php
                        $label = 'จำนวนแผ่นที่';
                        $varName = 'var_textbox_other_person_title741';
                        $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
                        ?>
                        <?= EzformWidget::label($label)?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                            <?php
                                $label = '3.4.1.1';
                                $varName = 'var_textbox_other_person_title3411';
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
                                $label = '3.4.1.2';
                                $varName = 'var_textbox_other_person_title3412';
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
                                $label = '3.4.1.3';
                                $varName = 'var_textbox_other_person_title3413';
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
                                $label = '3.4.1.4';
                                $varName = 'var_textbox_other_person_title3414';
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
                                $label = '3.4.1.5';
                                $varName = 'var_textbox_other_person_title3415';
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
                                $label = '3.4.1.6';
                                $varName = 'var_textbox_other_person_title3416';
                                $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
                                ?>
                                <?= EzformWidget::label($label)?>
                                <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
                                <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php
                                $label = 'และได้ให้';
                                $varName = 'var_form01_sub3_radio_person_title3416';
                                $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:0;

                                $varNameOther = 'var_radio_other_person_title3416';
                                $suffixOther = ' ';

                                $items = [
                                    'data'=>CoreFunc::itemAlias('person_title'),
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
                        </div>
                        <div class="col-md-6">
                            <?php
                            $label = 'เจ้าของบ้าน/ผู้เสียหายอื่นๆ';
                            $varName = 'var_form01_sub3_radio_person_title3416';
                            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                            $varNameOther = 'var_radio_other_person_title3416';
                            $suffixOther = ' ';

                            $items = [
                                'data' => CoreFunc::itemAlias('person_home_001'),
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
                        <div class="clearfix"></div>
                        <div><?= EzformWidget::label('ลงลายมือชื่อในแบบเก็บรอยลายนิ้วมือแฝงไว้เป็นหลักฐาน')?> </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <?php
                                $label = '3.4.2';
                                $varName = 'var_textbox_other_person_title342';
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
                                $label = '3.4.3';
                                $varName = 'var_textbox_other_person_title343';
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
                                $label = '3.4.4';
                                $varName = 'var_textbox_other_person_title344';
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
                                $label = '3.4.5';
                                $varName = 'var_textbox_other_person_title345';
                                $value = isset($data['content'][$varName]['value'])?$data['content'][$varName]['value']:'';
                                ?>
                                <?= EzformWidget::label($label)?>
                                <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class'=>'form-control'])?>
                                <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <?= EzformWidget::label("7.5 การดำเนินการเกี่ยวกับวัตถุพยาน")?>
                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        $label = '';
                        $varName = 'var_area_other_person_title350';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textarea("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                    </div>
                </div>
            </div>

             <div class="col-md-12">
                <?= EzformWidget::label("7.6 เจ้าหน้าที่") ?>
                 <div class="form-group">
                     <?php
                     $label = '';
                     $varName = 'var_radio__authorities_360';
                     $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                     $varNameOther = 'var_radio_other_authorities_360';
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
                <label>ตรวจสถานที่เกิดเหตุเสร็จสิ้นพร้อมทั้งส่งมอบสถานที่เกิดเหตุคืนให้กับพนักงานสอบสวนเจ้าของคดี</label>
                <div class="clearfix"></div>
                <div class="col-md-4">
                    <?php $label = 'เมื่อวันที่'; ?>
                    <label><?= $label; ?></label>
                    <?php
                    $varName = 'var_form01_sub3_date15';
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
                    $varName = 'Notify[content][var_form01_sub3_time_5][value]';
                    $vname = "var_form01_sub3_time_5";
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
            $varName = 'var_form01_textbox_cenname01';
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
            $varName = 'var_form01_textbox_cenname02';
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
            $varName = 'var_form01_textbox_position02';
            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
            ?>
            <?= EzformWidget::label($label) ?>
            <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
        </div>
    </div>
</div>