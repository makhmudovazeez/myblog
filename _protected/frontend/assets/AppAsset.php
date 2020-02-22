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
        'css/site.css',
        'libs/css/bootstrap.min.css',
        'libs/css/bootstrap-grid.min.css',
        'libs/css/bootstrap-reboot.min.css',
        'libs/css/font-awesome.min.css',
        'libs/css/tether.min.css',
        'libs/css/lightbox.min.css',
        'css/style.css',
        'css/responsive.css',
        'css/settings.css'
    ];
    public $js = [
        'libs/js/tether.min.js',
        'libs/js/jquery.smoothwheel.js',
        'libs/js/bootstrap.min.js',
        'libs/js/lightbox.min.js',
        'js/script.js'
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
    ];
}

