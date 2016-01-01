<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-11
 * Time: 上午10:16
 */
namespace app\controllers;

use Yii;
use yii\base\Controller;
use yii\filters\AccessControl;

class HomeController extends Controller
{

    public function behaviors()//行为验证 是登陆状态还是登出状态 要有什么操作
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'denyCallback' => function ($rule, $action) {
                     Yii::$app->response->redirect(['login/login']);
                },
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@'],//已登录的身份
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }



}