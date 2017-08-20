<?php 
    use appxq\sdii\widgets\EzformWidget;
    use backend\modules\core\classes\CoreFunc;
    
    //label ,varName , value, varNameOther, sufffixOther, core, number 
     
    $id = base64_decode($_REQUEST["data"]);
    
    $model = \backend\modules\cases\models\Notify::findOne($id);
    $data = \yii\helpers\Json::decode($model->content);
    
    $data = $data["content"][$varNameOther]["value"];
?>
<div class="form-group">
    <?php
    if(!empty($options)){
        $options = [
            'inline' => FALSE,
            'label' => $label,
            'other' => [
                'attribute' => "Notify[content][$varNameOther][value]",
                'value' => $data,
                'suffix' => $suffixOther,
            ],
        ];
    }else{
       $options = [
            'inline' => FALSE,
            'label' => $label,
            'other' => [
                 'attribute' => "Notify[content][$varNameOther][value]",
                 'value' => $data 
             ],
        ]; 
    }
    
    ?>
    <?= EzformWidget::checkbox("Notify[content][$varName][value]", $value, $options) ?>
    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
    <?= EzformWidget::hiddenInput("Notify[content][$varNameOther][suffix]", $suffixOther) ?>
</div>

<?php 
    //ตัวอย่างการเรียกใช้
   
    /*        //tools_used_by_criminals_to_steal 
    $label = "บ้านคอนกรีต";
    $varName = 'var_form01_sub1_checkbox_outside_1';
    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
    $varNameOther = 'var_form01_sub1_radio_other_tool1';
    $suffixOther = '';
     
    echo $this->render("../template/checkbox.php", [
        'varName' => $varName,
        'label' => $label,
        'value' => $value,
        'varNameOther' => $varNameOther,
        'suffixOther' => $suffixOther,
        'items' => $items,
        
    ]);

     *      */
?>