<div class="form-group">

    <label><?= $label; ?></label>
    <?php
    //Notify[content][var_form01_sub3_date1][value]
    //$varName = "var_form01_sub3_time_1";
//    $value = $data['content']['var_form01_sub3_time_1']['value'];
//
//    $varName = 'Notify[content][var_form01_sub3_time_1][value]';
//    $vname = "var_form01_sub3_time_1";
//    $value = isset($data['content'][$vname]['value']) ? $data['content'][$vname]['value'] : '';

    //\appxq\sdii\utils\VarDumper::dump($value);

    echo \kartik\widgets\TimePicker::widget([
        'name' => $varName,
        'value' => $value,
        'pluginOptions' => [
            'showSeconds' => false,
            'showMeridian' => false,
            'minuteStep' => 5,
        ]
    ]);
    ?>
    <!--<input type="text" class="form-control" name="Notify[content][_form1_sub_notification_01_date1][value]" value="<?= $value; ?>">-->
</div>
<?php 
     /*
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
      */

?>
 