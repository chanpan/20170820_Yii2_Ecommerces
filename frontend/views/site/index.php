<?php

use yii\helpers\Url;

// $this->registerCssFile(Url::to('../../../common/lib/zoomimg/assets/css/example.css'));
//$this->registerCssFile(Url::to('../../../common/lib/zoomimg/assets/css/pygments.css'));
//$this->registerCssFile(Url::to('../../../common/lib/zoomimg/assets/css/easyzoom.css'));
//\appxq\sdii\zoomimg\assets\ZoomImgAsset::register($this);
\appxq\sdii\zoomimg\assets\ZoomImgAsset::register($this);
?>

<div class="easyzoom easyzoom--overlay">
    <a href="<?= Url::to('@web/image/1_zoom.jpg')?>">
        <img src="<?= Url::to('@web/image/1_standard.jpg')?>" alt="" width="640" height="360" />
    </a>
</div>