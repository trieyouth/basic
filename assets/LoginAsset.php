<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-13
 * Time: 下午6:47
 */
namespace app\assets;

use yii\web\AssetBundle;

class LoginAsset extends AssetBundle{

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/common.css'
    ];
    public $js = [

    ];


    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}