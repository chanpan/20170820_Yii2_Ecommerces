<?php 
    use appxq\sdii\widgets\EzformWidget;
    use yii\helpers\Url;
?>
<div class="form-group">
    <?php
    $label = 'แผนผังสังเขป';
    $varName = 'var_form01_sub2_drawing_map';
    $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
    ?>
    <?= EzformWidget::label($label) ?>

    <?php
    echo appxq\sdii\widgets\SDDrawingv2::widget([
        'id' => $varName . '_' . $id_of_notify,
        'name' => "Notify[content][$varName][value]",
        'value' => $value,
        'allow_bg' => true,
    ]);
    ?>

    <?= EzformWidget::hiddenInput("Notify[content][$varName][label]", $label) ?>
</div>