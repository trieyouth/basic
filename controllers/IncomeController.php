<?php
/**
 * Created by PhpStorm.
 * User: youth
 * Date: 16-1-2
 * Time: 下午6:00
 */
namespace app\controllers;

use app\models\Order;
use Yii;
use yii\base\Controller;
use yii\filters\AccessControl;

class IncomeController extends Controller
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

    public function actionTable()
    {
        $id = Yii::$app->user->id;
        $res = array();
        $date = date("Y-m-d");
        for ($i = 30; $i > 0; $i--) {
            $time = strtotime($date) - 3600 * 24 * $i;
            $time = date('Y-m-d', $time);
            $res[$time] = 0;
        }
        $temp = Order::find()->select('b_time,price')->where(['s_id' => $id])->asArray()->all();
        foreach ($temp as $value) {
            $time = strtotime($value['b_time']);
            $time = date('Y-m-d', $time);
            if (array_key_exists($time, $res)) {
                $res[$time] += $value['price'] +10;
            }
        }
        return $this->render("table",['list'=>$res]);
    }
}