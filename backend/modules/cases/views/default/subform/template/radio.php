<?php 
    use appxq\sdii\widgets\EzformWidget;
    use backend\modules\core\classes\CoreFunc;
    
    //label ,varName , value, varNameOther, sufffixOther, core, number 
?>
 
<?php
$id = base64_decode($_REQUEST["data"]);
    
    $model = \backend\modules\cases\models\Notify::findOne($id);
    $data = \yii\helpers\Json::decode($model->content);
    
    $data = $data["content"][$varNameOther]["value"];

  
if(empty($number)){
    $item = [
    'data' => CoreFunc::itemAlias($items),
    'other' => [
        5 => [
            'attribute' => "Notify[content][$varNameOther][value]",
            'value' => $v,
            'suffix' => $suffixOther,
        ]
    ]
];
}else{
 
     
    $item = [
    'data' => CoreFunc::itemAlias($items),
    'other' => [
        $number => [
            'attribute' => "Notify[content][$varNameOther][value]",
            'value' => $data,//$data['content'][$varNameOther]['value'],
            'suffix' => $suffixOther,
        ]
    ]
];
} 

?>
<?= EzformWidget::label($label) ?>
<?= EzformWidget::radioList("Notify[content][$varName][value]", $value, $item, ['inline' => true]) ?>
<?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>


<?php 
    //ตัวอย่างการเรียกใช้
   
    /*        //tools_used_by_criminals_to_steal 
    $label = "เครื่องมือที่คนร้ายใช้ในการโจรกรรม";
    $varName = 'var_form01_sub1_radio_tool1';
    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
    $varNameOther = 'var_form01_sub1_radio_other_tool1';
    $suffixOther = '';
    $items = 'tools_by';

    echo $this->render("../template/radio.php", [
        'varName' => $varName,
        'label' => $label,
        'value' => $value,
        'varNameOther' => $varNameOther,
        'suffixOther' => $suffixOther,
        'items' => $items,
        'number' => 4
    ]);*/
?>