<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-16
 * Time: 下午1:19
 */
namespace app\assets;

class ErrorAsset extends \yii\web\AssetBundle{

     public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/error.css',
        'css/cloud-admin.css',
        'css/font-awesome.min.css',
    ];
    public $js = [

    ];


    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}