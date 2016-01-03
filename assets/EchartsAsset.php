<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 16-1-2
 * Time: 下午9:30
 */
namespace app\assets;

use yii\web\AssetBundle;

class EchartsAsset extends AssetBundle
{
    public $sourcePath = '@bower/bower-asset/echarts/src';
    public $js = [
        'echarts.js',
    ];
}