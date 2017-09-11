<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Roboto',
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/responsive_bootstrap_carousel_mega_min.css',
        'css/theme.css',
        'css/intlTelInput.css',
        'css/product-img-slider.css',
        'css/magiczoom.css',
        'css/xzoom.css',
        'css/site.css',
        'css/style.css',
        'css/responsive.css',
    ];
    public $js = [
//        'js/jquery-3.2.1.min.js',
        'js/bootstrap.min.js',
        'js/main-slider.js',
//        'js/jquery.touchSwipe.min.js',
        'js/responsive_bootstrap_carousel.js',
//        'js/date-picker.js',
        'js/star-rating.js',
//        'js/product-img-slider.js',
//        'js/jquery.elevatezoom.js',
        'js/magiczoom.js',
//        'js/foundation.min.js',
//        'js/setup.js',
        'js/xzoom.min.js',
        'js/custom.js',
        'js/left-accordation-toggle.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
