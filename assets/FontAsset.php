<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-16
 * Time: 下午9:28
 */
namespace app\assets;
use yii\web\AssetBundle;

class FontAsset extends AssetBundle{
    public $sourcePath = '@vendor/fortawesome/font-awesome';
    public $css = [
        'css/font-awesome.css',
    ];
}