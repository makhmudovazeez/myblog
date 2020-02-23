<?php
/**
 * -----------------------------------------------------------------------------
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * -----------------------------------------------------------------------------
 */

namespace frontend\assets;

use yii\web\AssetBundle;
use Yii;

// set @themes alias so we do not have to update baseUrl every time we change themes
Yii::setAlias('@themes', Yii::$app->view->theme->baseUrl);

/**
 * -----------------------------------------------------------------------------
 * @author Qiang Xue <qiang.xue@gmail.com>
 *
 * @since 2.0
 * -----------------------------------------------------------------------------
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@themes';
    
    public $css = [
        "css/linearicons.css",
        "css/font-awesome.min.css",
        "css/bootstrap.css",
        "css/magnific-popup.css",
        "css/nice-select.css",
        "css/animate.min.css",
        "css/owl.carousel.css",
        "css/jquery-ui.css",
        "css/main.css",
        'default/css/site.css',
        'default/libs/css/bootstrap.min.css',
        'default/libs/css/bootstrap-grid.min.css',
        'default/libs/css/bootstrap-reboot.min.css',
        'default/libs/css/font-awesome.min.css',
        'default/libs/css/tether.min.css',
        'default/libs/css/lightbox.min.css',
        'default/css/style.css',
        'default/css/responsive.css',
        'default/css/settings.css',

    ];
    public $js = [
        "js/vendor/jquery-2.2.4.min.js",
        "js/vendor/bootstrap.min.js",
        "js/easing.min.js",			
        "js/hoverIntent.js",
        "js/superfish.min.js",	
        "js/jquery.ajaxchimp.min.js",
        "js/jquery.magnific-popup.min.js",	
        "js/jquery.tabs.min.js",						
        "js/jquery.nice-select.min.js",	
        "js/owl.carousel.min.js",									
        "js/mail-script.js",	
        "js/main.js",	
        "js/popper.min.js",	
        'default/libs/js/tether.min.js',
        'default/libs/js/jquery.smoothwheel.js',
        'default/libs/js/bootstrap.min.js',
        'default/libs/js/lightbox.min.js',
        'default/js/script.js',

    ];
    
    public $depends = [
        'yii\web\YiiAsset',
    ];
}

