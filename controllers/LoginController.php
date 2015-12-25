<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-10
 * Time: 下午4:15
 */
namespace app\controllers;

use app\models\LoginForm;
use app\models\SignupForm;
use Yii;
use yii\base\Controller;
use yii\filters\AccessControl;

class LoginController extends Controller
{

    public $layout = false;

    public function behaviors()//行为验证 是登陆状态还是登出状态 要有什么操作
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'signup'],
                'denyCallback' => function ($rule, $action) {
                    if (strcmp($action->id, 'logout') == 0) {
                        throw new \Exception('您还没有登陆');
                    }
                    if (strcmp($action->id, 'login') == 0 || strcmp($action->id, 'signup') == 0) {
                        throw new \Exception('您已经登陆');
                    }
                },
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],//游客身份
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
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

    public function actionLogin()
    {

        if (!Yii::$app->user->isGuest) {
            return Yii::$app->response->redirect(['home/index']);
        }

        $login = new LoginForm();

        if ($login->load(Yii::$app->request->post()) && $login->login()) {
            return Yii::$app->response->redirect(['home/index']);
        } else {
            return $this->render('login', [
                'model' => $login,
            ]);//登陆失败就渲染布局
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return Yii::$app->response->redirect(['login/login']);//跳转的页面
    }

    public function actionSignup()
    {
        $register = new SignupForm();

        if($register->load(YII::$app->request->post()) && $register->signup()){
            return YII::$app->response->redirect(['login/login']);
        }else{
            return $this->render('signup', [
                'model' => $register,
            ]);
        }
    }

}