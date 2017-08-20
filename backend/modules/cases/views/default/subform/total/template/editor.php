<?php
use yii\helpers\Url;
use appxq\sdii\widgets\EzformWidget;

//$label = 'พฤติการณ์ของคดี';
//$varName = 'var_result';
//$value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : '';
?>
<?= EzformWidget::label($label) ?>

<?php

echo \vova07\imperavi\Widget::widget([
    'id' => 'var_text_editor-1',
    'name' => "Notify[content][$varName][value]",
    'value' => $value,
    'settings' => [
        'lang' => 'th',
        'minHeight' => 30,
        'imageManagerJson' => Url::to(['/cases/upload/images-get']),
        'fileManagerJson' => Url::to(['/cases/upload/files-get']),
        'imageUpload' => Url::to(['/cases/upload/image-upload']),
        'fileUpload' => Url::to(['/cases/upload/file-upload']),
        'plugins' => [
            'fontcolor',
            'fontfamily',
            'fontsize',
            'textdirection',
            'textexpander',
            'counter',
            'table',
            'definedlinks',
            'video',
            'imagemanager',
            'filemanager',
            'limiter',
            'fullscreen',
        ]
    ]
]);
?>

<?=

EzformWidget::hiddenInput("Notify[content][$varName][label]", $label)?>


<?php 
    /*
                $label = "ด้านหลังติด";
                $varName = 'var_form01_sub1_textbox_outside_0001';
                $value = isset($data['content'][$varName]['value']) ? $data['content'][$varName]['value'] : 0;
                

                echo $this->render("../template/editor.php", [
                    'varName' => $varName,
                    'label' => $label,
                    'value' => $value,
                ]);
      */

?>
