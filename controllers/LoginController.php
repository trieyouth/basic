<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-10
 * Time: 下午4:15
 */
namespace app\controllers;

use Yii;
use yii\base\Controller;

class LoginController extends Controller{

    public function actionIndex(){
        return $this->render('index');
    }

    public function actionLogin(){
        echo 'hello sir';
    }

}