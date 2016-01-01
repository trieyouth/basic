<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-30
 * Time: 下午9:32
 */
namespace app\assets;

use yii\web\AssetBundle;

class DisplayAsset extends AssetBundle{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/display.css',
    ];
    public $js = [

    ];


    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}