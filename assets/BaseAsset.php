<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-13
 * Time: 下午7:22
 */
namespace app\assets;

use yii\web\AssetBundle;

class BaseAsset extends AssetBundle{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/base.css',
        'css/common.css'
    ];
    public $js = [
        'js/base.js',
        'js/jquery.js',
    ];

}