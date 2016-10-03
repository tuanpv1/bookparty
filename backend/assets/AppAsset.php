<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/font/font_open_sans.css',
    ];
    public $js = [
        'tinymce/tinymce.min.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        #'yii\bootstrap\BootstrapAsset',
        'common\assets\MetronicAdminAsset',
    ];
}