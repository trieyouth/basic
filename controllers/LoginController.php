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
use yii\filters\AccessControl;

class LoginController extends Controller
{

    public $layout = false;


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'signup'],
                'denyCallback' => function ($rule, $action) {
                    if(strcmp($action->id,'logout')==0){
                        throw new \Exception('您还没有登陆');
                    }
                    if(strcmp($action->id,'login')==0 || strcmp($action->id,'signup')==0){
                        throw new \Exception('您已经登陆');
                    }
                },
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        echo 'index';
        return $this->render('index');
    }

    public function actionLogin()
    {

    }

    public function actionLogout()
    {

    }

    public function actionSignUp()
    {

    }

}