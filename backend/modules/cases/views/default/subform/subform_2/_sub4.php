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
                $varName = 'var_form02_sub600_date1';
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
                    $varName = 'Notify[content][var_form02_sub3_time_601][value]';
                    $vname = "var_form02_sub3_time_601";
                    $value = isset($data['content'][$vname]['value']) ? $data['content'][$vname]['value'] : '00:00';


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
                    $varName = 'var_form02_sub3_routine602';
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
                    $varName = 'var_form02_sub3_pst603';
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
                    $varName = 'var_form02_sub3_pst_new64';
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
                    $varName = 'var_form02_sub3_pst605';
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
                    $varName = 'var_form02_sub3_book_phone606';
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
                    $varName = 'var_form02_sub3_snsp607';
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
                        $label = 'ขอเจ้าหน้าที่ร่วมตรวจสถานที่เกิดเหตุคดีเกี่ยวกับชีวิตโดยมี (เป็นพนักงานสอบสวนเจ้าของคดี)';
                        $varName = 'var_form02_sub3_aitc608';
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
                    $varName = 'var_form02_sub3_the_accident_location609';
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
                    $varName = 'var_form02_sub3_house_owner610';
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
                    $varName = 'var_form02_sub3_house_owner_age611';
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
                    $varName = 'var_form02_sub3_date612';
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
                    $varName = 'Notify[content][var_form02_sub3_time_613][value]';
                    $vname = "var_form02_sub3_time_613";
                    $value = isset($data['content'][$vname]['value']) ? $data['content'][$vname]['value'] : '00:00';


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
                    $varName = 'var_form02_sub3_date614';
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
                    $varName = 'Notify[content][var_form02_sub3_time_615][value]';
                    $vname = "var_form02_sub3_time_615";
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
                    $varName = 'var_form02_sub3_date616';
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
                    $varName = 'Notify[content][var_form02_sub3_time_617][value]';
                    $vname = "var_form02_sub3_time_617";
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
                        $varName = 'var_form02_sub3_officer618';
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
                        $varName = 'var_form02_sub3_position619';
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
                        $varName = 'var_form02_sub3_officer620';
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
                        $varName = 'var_form02_sub3_position621';
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
                        $varName = 'var_form02_sub3_officer622';
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
                        $varName = 'var_form02_sub3_position623';
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
                        $varName = 'var_form02_sub3_officer624';
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
                        $varName = 'var_form02_sub3_position625';
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
             <?= EzformWidget::label("6.1 ลักษณะภายนอก")?>
            <div class="clearfix"></div>
            <div class="col-md-6">
                <div class="form-group">
                        <?php
                        $label = 'เป็นบ้าน';
                        $varName = 'var_form02_sub3_checkbox_home626';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                        $varNameOther = 'var_check_other_form01_sub3_checkbox_home626';
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
                        $varName = 'var_form02_sub3_checkbox_home627';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                        $varNameOther = 'var_check_other_form01_sub3_checkbox_home627';
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
                        $varName = 'var_form02_sub3_checkbox_home628';
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
                        $varName = 'var_form02_sub3_checkbox_home629';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                        $varNameOther = 'var_check_other_form02_sub3_checkbox_home629';
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
                        $varName = 'var_check_other_form02_sub3_textinput_num1630';
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
                        $varName = 'var_check_other_form02_sub3_radio_home_unit1631';
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
                        $varName = 'var_check_other_form02_sub3_radio_home_class1632';
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
                        $varName = 'var_check_other_form01_sub3_radio_home_class2633';
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
                        $varName = 'var_check_other_form01_sub3_radio_home_class3634';
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
                    $varName = 'var_form01_sub3_textbox_front1635';
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
                    $varName = 'var_form01_sub3_textbox_front2636';
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
                    $varName = 'var_form01_sub3_textbox_front2637';
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
                    $varName = 'var_form01_sub3_textbox_front3638';
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
                    $varName = 'var_form01_sub3_textbox_front4639';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                    ?>
                    <?= EzformWidget::label($label) ?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                </div>
            </div>

        </div>


         <div class="col-md-12">
             <?= EzformWidget::label("6.2 ลักษณะภายใน")?>
             <div class="col-md-12" style="margin-top:-15px;">
                 <div class="form-group">
                <?php
                     $label = '';
                     $varName = 'var_form01_sub3_textarea_in1640';
                     $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                     ?>
                     <?= EzformWidget::label($label) ?>
                     <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                     <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                 </div>
             </div>
             <div class="clearfix"></div>
             <?= EzformWidget::label("6.3 บริเวณที่เกิดเหตุ")?>  
             <div class="col-md-12">
                 <div class="form-group">
                   
                <?php
                     $label = 'บริเวณที่เกิดเหตุ เกิดเหตุที่';
                     $varName = 'var_form01_sub3_textarea_in2641';
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
                     $label = 'ซึ่งมีขนาดกว้าง X ยาวประมาณ';
                     $varName = 'var_form01_sub3_textarea_in2_width_x_height642';
                     $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                     ?>
                     <?= EzformWidget::label($label) ?>
                     <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                     <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                 </div>
             </div>
             
             <div class="col-md-12">
                 <div><b>ลักษณะโครงสร้าง</b></div>
                 <div class="clearfix"></div>
                 <div class="col-md-4">
                     <div class="form-group">

                         <?php
                         $label = 'ฝาผนังด้านหน้า';
                         $varName = 'var_form01_sub3_textbox_sub4_000001643';
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
                         $label = 'หน้าต่าง(บาน)';
                         $varName = 'var_form01_sub3_textbox_sub4_000002644';
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
                         $label = 'ประตู(บาน)';
                         $varName = 'var_form01_sub3_textbox_sub4_000003645';
                         $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                         ?>
                         <?= EzformWidget::label($label) ?>
                         <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                         <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                     </div>
                 </div>
                 
                 <div class="clearfix"></div>
                 <div class="col-md-4">
                     <div class="form-group">

                         <?php
                         $label = 'ฝาผนังด้านซ้าย';
                         $varName = 'var_form01_sub3_textbox_sub4_0000001646';
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
                         $label = 'หน้าต่าง(บาน)';
                         $varName = 'var_form01_sub3_textbox_sub4_0000002647';
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
                         $label = 'ประตู(บาน)';
                         $varName = 'var_form01_sub3_textbox_sub4_0000003648';
                         $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                         ?>
                         <?= EzformWidget::label($label) ?>
                         <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                         <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                     </div>
                 </div>
                 
                 
                 <div class="clearfix"></div>
                 <div class="col-md-4">
                     <div class="form-group">

                         <?php
                         $label = 'ฝาผนังด้านขวา';
                         $varName = 'var_form01_sub3_textbox_sub4_00000001649';
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
                         $label = 'หน้าต่าง(บาน)';
                         $varName = 'var_form01_sub3_textbox_sub4_00000002650';
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
                         $label = 'ประตู(บาน)';
                         $varName = 'var_form01_sub3_textbox_sub4_00000003651';
                         $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                         ?>
                         <?= EzformWidget::label($label) ?>
                         <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                         <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                     </div>
                 </div>
                 
                 <div class="clearfix"></div>
                 <div class="col-md-4">
                     <div class="form-group">

                         <?php
                         $label = 'ฝาผนังด้านหลัง';
                         $varName = 'var_form01_sub3_textbox_sub4_000000000001652';
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
                         $label = 'หน้าต่าง(บาน)';
                         $varName = 'var_form01_sub3_textbox_sub4_000000000002653';
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
                         $label = 'ประตู(บาน)';
                         $varName = 'var_form01_sub3_textbox_sub4_000000000003654';
                         $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                         ?>
                         <?= EzformWidget::label($label) ?>
                         <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                         <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                     </div>
                 </div>
                 
                 <div class="clearfix"></div>
                 <div class="col-md-4">
                     <div class="form-group">

                         <?php
                         $label = 'พื้นห้อง';
                         $varName = 'var_form01_sub3_textbox_sub4_0000322200000001655';
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
                         $label = 'เพดาน';
                         $varName = 'var_form01_sub3_textbox_sub4_0000000201110002656';
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
                         $label = 'หลังคา';
                         $varName = 'var_form01_sub3_textbox_sub4_000000001110003657';
                         $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                         ?>
                         <?= EzformWidget::label($label) ?>
                         <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                         <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                     </div>
                 </div>
                  
             </div>
             
             <div class="col-md-12">
                 <div><b>ลักษณะการจัดวางสิ่งของ</b></div>
                 <div class="clearfix"></div>
                 <div class="col-md-12">
                     <div class="form-group">

                         <?php
                         $label = 'ชิดฝาผนังด้านหน้าเรียงจากซ้ายไปขวา';
                         $varName = 'var_form01_sub3_textbox_sub4_000001_left_to_right658';
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
                         $label = 'ชิดฝาผนังด้านซ้ายเรียงจากหน้าไปหลัง';
                         $varName = 'var_form01_sub3_textbox_sub4_000001_left_to_right2659';
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
                         $label = 'ชิดฝาผนังด้านขวาเรียงจากหน้าไปหลัง';
                         $varName = 'var_form01_sub3_textbox_sub4_000001_left_to_right3660';
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
                         $label = 'ชิดฝาผนังด้านหลังเรียงจากซ้ายไปขวา';
                         $varName = 'var_form01_sub3_textbox_sub4_000001_left_to_right4661';
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
                         $label = 'บริเวณอื่นๆ';
                         $varName = 'var_form01_sub3_textbox_sub4_000001_left_to_right5662';
                         $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                         ?>
                         <?= EzformWidget::label($label) ?>
                         <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                         <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                     </div>
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
                    $label = 'พฤติการณ์ของคดี จากการสอบถามข้อมูลในเบื้องต้นจาก พงส. ได้ความว่า';
                    $varName = 'var_form01_sub3_textarea_output1663';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                    ?>
                    <?= EzformWidget::label($label) ?>
                    <?= EzformWidget::textarea("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                </div>
            </div>
            <div class="col-md-12"><br>
                <?= EzformWidget::label("จากการตรวจสถานที่เกิดเหตุ")?>
                <div class="form-group margin-top">
                    <?php
                    $label = '7.1 สภาพของสถานที่เกิดเหตุ';
                    $varName = 'var_form01_sub3_house_owner1sdsf664';
                    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                    ?>
                    <?= EzformWidget::label($label) ?>
                    <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                </div>
            </div>
            <div class="col-md-12 margin-top">
                <div><?= EzformWidget::label("7.2 ลักษณะสภาพศพ")?></div>
                

                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        $label = '7.2.1 พบศพ/ไม่พบศพ';
                        $varName = 'var_form03_sub4_house_owner_body001665';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $label = '7.2.2 ตำแหน่งที่พบศพ';
                        $varName = 'var_form03_sub4_house_owner_body002666';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $label = '7.2.3 สภาพศพ';
                        $varName = 'var_form03_sub4_house_owner_body003667';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $label = '7.2.4 สภาพเครื่องแต่งกายและทรัพย์สิน';
                        $varName = 'var_form03_sub4_house_owner_body004668';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $label = '7.2.5 รอยบาดแผลที่ศพ';
                        $varName = 'var_form03_sub4_house_owner_body005669';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                    </div>
 
                </div>
  
            </div>




            <div class="col-md-12">
                <?= EzformWidget::label("7.3 ร่องรอยและวัตถุพยานที่ตรวจพบในสถานที่เกิดเหตุ")?>
               <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        $label = '';
                        $varName = 'var_form03_sub4d_house_owner1_0000_dsf3671';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                    </div>
                </div>
            </div>
            
             <div class="col-md-12">
                <?= EzformWidget::label("7.4 วัตถุพยานที่ตรวจเก็บในสถานที่เกิดเหตุ")?>
               <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        $label = '';
                        $varName = 'var_form03_sub4d_house_ownesdfr1_0000_dsf3sdfsd672';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12">
                <?= EzformWidget::label("7.5 การดำเนินการเกี่ยวกับวัตถุพยาน")?>
               <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        $label = '';
                        $varName = 'var_form03_sub4d_house_ownesdfr1_0000_dsf3sdfsdsdf673';
                        $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                        ?>
                        <?= EzformWidget::label($label) ?>
                        <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
                        <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12">
                <?= EzformWidget::label("7.6 เจ้าหน้าที่")?>
                <div class="col-md-12" style="margin-top:-25px;">
 
                       <div class="form-group">
                           <?php
                           $label = '';
                           $varName = 'var_radio__authorities_360dfsdfsdf674';
                           $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;

                           $varNameOther = 'var_radio_other_authorities_360sdfsdf';
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
                            $varName = 'var_form01_sub3_date15_dsfs3675';
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
                            $varName = 'Notify[content][var_form01_sub3_time_5dd676][value]';
                            $vname = "var_form01_sub3_time_5dd676";
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
            $varName = 'var_form01_textbox_cenname01677';
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
            $varName = 'var_form01_textbox_cenname02678';
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
            $varName = 'var_form01_textbox_position02679';
            $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
            ?>
            <?= EzformWidget::label($label) ?>
            <?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
            <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
        </div>
    </div>
</div>