<?php
use appxq\sdii\widgets\EzformWidget;

//$label = 'ลักษณะภายใน';
//$varName = 'var_private';
//$value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
?>
<?= EzformWidget::label($label) ?>
<?= EzformWidget::textInput("Notify[content][$varName][value]", $value, ['class' => 'form-control']) ?>
<?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>


<?php

/*
  $label = "ด้านหลังติด";
  $varName = 'var_form01_sub1_textbox_outside_0001';
  $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
  echo $this->render("../template/text.php", [
  'varName' => $varName,
  'label' => $label,
  'value' => $value,
  ]);
 */
?>
