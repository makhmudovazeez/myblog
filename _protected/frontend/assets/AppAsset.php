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
        "css/main.css",
        "css/noscript.css",
        "css/register.css",
        "css/fonts.css",
    ];
    public $js = [
        "js/jquery.min.js",
        "js/jquery.js",
        "js/jquery.scrollex.min.js",
        "js/jquery.scrolly.min.js",
        "js/browser.min.js",
        "js/breakpoints.min.js",
        "js/util.js",
        "js/main.js",
        "js/global.js",
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
    ];
}

