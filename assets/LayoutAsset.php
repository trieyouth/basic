<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-16
 * Time: 下午4:09
 */
namespace app\assets;

use yii\web\AssetBundle;

class LayoutAsset extends AssetBundle{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/layout.css',
        'css/common.css'
    ];
    public $js = [
        'js/layout.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapThemeAsset',
    ];
}