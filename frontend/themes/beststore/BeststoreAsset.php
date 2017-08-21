<?php

namespace frontend\themes\beststore;

use yii\web\AssetBundle;
 
class BeststoreAsset extends AssetBundle
{
    public $sourcePath = '@frontend/themes/beststore';

    public $css = [
        'css/bootstrap.css',
        'css/style.css',
        '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic',
        '//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic',
        'css/jquery.countdown.css',
        'css/animate.min.css'
   
    ];
    public $js = [
       'js/jquery.min.js',
       'js/simpleCart.min.js',
       'js/bootstrap-3.1.1.min.js',
        'js/wow.min.js',
        'js/classie.js',
        'js/uisearch.js',
        'js/jquery.wmuSlider.js',
        'js/jquery.countdown.js',
        'js/script.js',
        
    ];
    public $depends = [
      // 'yii\web\YiiAsset',
    ];
}
