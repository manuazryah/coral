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
	    'https://cdnjs.cloudflare.com/ajax/libs/flickity/2.0.10/flickity.min.css',
	    'css/bootstrap.min.css',
	    'css/font-awesome.min.css',
	    'css/xenon-forms.css',
	    'css/responsive_bootstrap_carousel_mega_min.css',
	    'css/theme.css',
	    'css/intlTelInput.css',
	    'css/product-img-slider.css',
	    'css/slick.css',
	    'css/magiczoom.css',
	    'css/xzoom.css',
	    'css/site.css',
	    'css/create-our-own.css',
	    'css/style.css',
	    'css/testimonial.css',
	    'css/responsive.css',
	];
	public $js = [
	    // 'js/jquery-3.2.1.min.js',
	    'js/bootstrap.min.js',
//	    'https://cdnjs.cloudflare.com/ajax/libs/flickity/2.0.10/flickity.pkgd.min.js',
	    'js/main-slider.js',
	    'js/slick.js',
//        'js/jquery.touchSwipe.min.js',
	    'js/responsive_bootstrap_carousel.js',
//        'js/date-picker.js',
	    'js/star-rating.js',
//        'js/product-img-slider.js',
//        'js/jquery.elevatezoom.js',
	    'js/magiczoom.js',
	    'js/create-our-own.js',
	    'js/jquery.easing.min.js',
	    'js/benifits-img-box.js',
//        'js/foundation.min.js',
//        'js/setup.js',
	    'js/left-accordation-toggle.js',
//        'js/happy-slider.js',
	    'https://www.google.com/recaptcha/api.js',
	    'js/client-slider.js',
//	    'js/testimonial.js',
	    //'js/xzoom.min.js',
	    'js/custom.js',
	    'js/create-our-own.js',
	];
	public $depends = [
	    'yii\web\YiiAsset',
	    'yii\bootstrap\BootstrapAsset',
	];

}
