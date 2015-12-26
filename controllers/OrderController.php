<?php
namespace app\controllers;

use Yii;
use yii\base\Controller;
use app\models\Order;
use app\models\Orderdish;
use app\models\Dish;
use yii\web\Session;

$session = new Session;
$session->open();

/**
 * Created by PhpStorm.
 * User: user
 * Date: 2015/12/23
 * Time: 17:58
 */
class OrderController extends Controller
{

    public function actionAdddish()//id为dish_id
    {
        //Yii::$app->session->destroy();
        $id = Yii::$app->request->post('id');
        $dInfo = Dish::findOne($id)->attributes;
        if (empty($dInfo) || count($dInfo) < 0) {
            exit('no dish');
        } else {
            $dInfo["num"] = 1;
            if (isset($_SESSION["dishlist"][$id])) {
                $num = $_SESSION["dishlist"][$id]["num"];
                $num++;
                $_SESSION["dishlist"][$id]["num"] = $num;
            } else {
                $_SESSION["dishlist"][$id] = $dInfo;
            }
        }
        return json_encode($_SESSION["dishlist"]);
    }

    /**
     *减少菜的数量
     */
    public function actionSubdish()
    {
        if ($_POST['id']) {
            $id = $_POST['id'];
            $dInfo["num"] = 1;
            if (isset($_SESSION["dishlist"][$id])) {
                $num = $_SESSION["dishlist"][$id]["num"];
                $num--;
                $_SESSION["dishlist"][$id]["num"] = $num;
            } else {
                error('have not this dish');
            }
        }
        return json_encode($_SESSION["dishlist"]);
    }

    /**
     *删除一个菜
     */
    public function actionDeldish()
    {
        if ($_POST['id']) {
            //从session中删除指定菜
            unset($_SESSION["dishlist"][$_POST['id']]);
        } else {
            //清空session，结束点单用
            unset($_SESSION["dishlist"]);
        }
        return json_encode($_SESSION["dishlist"]);

    }


    /**
     *将完成的订单信息存入数据库
     */
    public function actionAddorder()
    {
//        生成b_time count price（需要查询）
//
//        $timeoffset = 8;
//        echo date('y-m-d h:i:s',time());
//        $order->o_id = //怎么自动生成一个id
//        $b_id 在AddOder 中  要验证seat的状态

        $order = new Order();
        $res = Yii::$app->request;
        $order->o_id = $this->actionGetoid();
        //$order->s_id = '1@qq.com';
        $order->s_id = Yii::$app->user->id;
        $order->seat_id = $res->post('seat_id');
        $order->b_time = date('y-m-d h:i:s', time());
        $order->count = count($_SESSION["dishlist"]);
        $order->desc = $res->post('desc');
        $order->price = $this->actionAccprice();
        if ($order->validate()) {
            foreach($_SESSION['dishlist'] as $dish){
                $one = new Orderdish();
                $one->o_id = $order->o_id;
                $one->d_id = $dish['dish_id'];
                $one->count = $dish['num'];
                $one->price = $dish['price'];
                if ($one->validate()&&$one->save()) {
                }else{error('error');}
            }
            $order->save();
            return 'success';
        } else {
            return 'fales';
        }

    }

    /**
     *列出一个人的订单ok
     */
    public function actionListorder()
    {
        $dish_list = $_SESSION['dishlist'];
        return json_encode($dish_list);

    }

    /**
     *显示一个已完成的菜单 传入订单号 付账时或者查看自己的订单时使用（客户用）
     */
    public function actionListforder(){
        $o_id = $_POST['id'];
        $order = Order::find()->where(['o_id'=>$o_id])->one()->attributes;
        return json_encode($order);
    }

    /**
     *显示一个完成的菜单中的每一个菜(客户用)
     */
    public function actionListfdish(){
        $o_id = $_POST['o_id'];
        $dish = Orderdish::find()->where(['o_id'=>$o_id])->asArray()->all();
        return json_encode($dish);
    }

    /**
     *列出所有未完成的订单（厨师用）
     */
    public function actionListnforder()
    {
        //$s_id = '1@qq.com';
        $s_id = Yii::$app->user->id;
        $orderList = Order::find()->where(['s_id'=>$s_id,'e_time'=>null])->one()->attributes;
        return json_encode($orderList);
        //使用此函数需要详细菜单时调用actionlishdish()
    }

    /**
     *完成一个订单 （厨师用）
     */
    public function actionFinishorder()
    {
        $o_id = $_POST['o_id'];
        $order = Order::findOne($o_id);
        $order->e_time = date('y-m-d h:i:s', time());
        if ($order === null) {
            throw new NotFoundHttpException;
        }
        if ($order->save()) {
            echo 'success';
            // 获取用户输入的数据，验证并保存
        }

    }

    public function actionGetoid(){
        echo mt_srand((double)microtime()*1000000);
        return date('Ymd').str_pad(mt_rand(1,99999),5,'0',STR_PAD_LEFT);
    }

    public function actionAccprice()
    {
        $count = 0;
        foreach ($_SESSION['dishlist'] as $dish) {
            if ($dish['discount']) {
                $count += $dish['price'] * $dish['num'] * $dish['discount'];
            } else {
                $count += $dish['price'] * $dish['num'];
            }
        }
        return $count;
    }
}