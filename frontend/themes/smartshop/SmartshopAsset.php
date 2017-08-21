<?php

namespace frontend\themes\smartshop;

use yii\web\AssetBundle;
 
class SmartshopAsset extends AssetBundle
{
    public $sourcePath = '@frontend/themes/smartshop/assets';

    public $css = [
        'css/bootstrap.css',
        'css/pignose.layerslider.css',
        'css/style.css',
        '//fonts.googleapis.com/css?family=Montserrat:400,700',
        '//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic'
    ];
    public $js = [
        'js/jquery-2.1.4.min.js',
        'js/simpleCart.min.js',
        'js/bootstrap-3.1.1.min.js',
        'js/jquery.easing.min.js',
        'js/pignose.layerslider.js',
        'js/easyResponsiveTabs.js',
        'js/imagezoom.js'
       
    ];
    public $depends = [
          'yii\web\YiiAsset',
    ];
}
