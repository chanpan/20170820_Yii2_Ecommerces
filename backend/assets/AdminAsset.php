<?php
 

namespace backend\assets;

use yii\web\AssetBundle;
 
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css?99',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
	    'appxq\sdii\assets\SDAsset',
	    'backend\themes\admin\assets\ThemeAsset',
    ];
}
