<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/new.css',
        'css/style-responsive.css',
        'css/font-awesome.css',
        'css/jquery.bxslider.css'
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/jquery.bxslider.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
