<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-12
 * Time: 下午5:58
 */
namespace app\util;
use yii\base\Object;
use yii\helpers\Url;

class IntentUtil extends Object{

    public static function sendParams($name='',$head=''){
        $view = \Yii::$app->view;
        $view->params['name']=$name;
        $view->params['head']=Url::to($head,true);
        $view->params['back']=Url::to('@web/img/fond.png',true);
    }

}