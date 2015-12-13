<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-10
 * Time: 下午4:15
 */
namespace app\controllers;

use app\models\LoginForm;
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
        if(!Yii::$app->user->isGuest){//看是否已经登陆
            return Yii::$app->response->redirect(['home/index']);//controller之间的调用
        }

        $login = new LoginForm();

        if($login->load(Yii::$app->request->post()) && $login->validate()){
            return Yii::$app->response->redirect(['home/index']);
        }else{
            return $this->render('login',[
            'model' => $login,
        ]);
        }

    }

    public function actionLogout()
    {
        if(YII::$app->user->isGuest){

        }
    }

    public function actionSignUp()
    {

    }

}