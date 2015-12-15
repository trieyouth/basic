<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-15
 * Time: 下午4:45
 */
namespace app\controllers;
use yii\base\Controller;

class CommonController extends Controller{

     public $layout = false;

    public function  actionError(){
        return $this->render("error_404");
    }

}