<div class="form-group">
    
    <label><?= $label; ?></label>
    <?php
    
    echo kartik\widgets\DatePicker::widget([
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

<?php 
     /*
                $label = "วันที่";
                $varName = 'var_form01_sub3_date1';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
                
                echo $this->render("../template/datepicker.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                    
                ]);
      */

?>