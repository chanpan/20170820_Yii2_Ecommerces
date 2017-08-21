<?php

namespace appxq\sdii\zoomimg\assets;

use yii\web\AssetBundle;

class ZoomImgAsset extends AssetBundle {

	public $sourcePath = "@appxq/sdii/zoomimg/assets";
	public $css = [
            //'css/example.css',
            'css/pygments.css',
            'css/easyzoom.css'
	];
	public $js = [
            'js/easyzoom.js',
            'js/control.js'
	];
	public $depends = [
 
	];

}
