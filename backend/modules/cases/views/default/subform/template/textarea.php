 <?php
use appxq\sdii\widgets\EzformWidget;

//$label = 'ลักษณะภายใน';
//$varName = 'var_private';
//$value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
?>
<?= EzformWidget::label($label) ?>
<?= EzformWidget::textarea("Notify[content][$varName][value]", $value, ['class' => 'form-control', 'rows'=>3]) ?>
<?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>


<?php

/*
  $label = "ด้านหลังติด";
  $varName = 'var_form01_sub1_textbox_outside_0001';
  $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
  echo $this->render("../template/textarea.php", [
  'varName' => $varName,
  'label' => $label,
  'value' => $value,
  ]);
 */
?>
