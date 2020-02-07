<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
		'/css/magnific-popup.css',
		'/css/OverlayScrollbars.css',
		'/css/select2.css',
		'/css/main.css',
		'/css/responsive.css',
    ];
    public $js = [
		'/js/jquery.magnific-popup.min.js',
                '/js/jquery.sticky.js',
		'/js/jquery.maskedinput.min.js',
		'/js/jquery.overlayScrollbars.min.js',
		'/js/select2.min.js',
		'/js/svg4everybody.min.js',
		'/js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\PopperAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}