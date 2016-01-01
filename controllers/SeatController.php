<?php
namespace app\controllers;

use Yii;
use yii\base\Controller;
use app\models\Seat;

/**
 * Created by PhpStorm.
 * User: user
 * Date: 2015/12/23
 * Time: 16:41
 */


class SeatController extends Controller{

    /**
     *
     */
    public function actionAdd(){
        $seat = new Seat();
        $res = Yii::$app->request;
        $seat->s_id = Yii::$app->user->id;
        //$seat->s_id = '1@qq.com';
        $seat->id = $res->post('id');
        $seat->count = $res->post('count');
        $seat->status = 0;
        if($seat->validate()&&$seat->save()){
            return 'success';
        }else{
            return 'fales';
        }
    }

    /**
     *
     */
    public function actionDel(){

        $id = Yii::$app->request->post('id');
        //$s_id = Yii::$app->user->id;
        $s_id = '1@qq.com';
        if($seat = Seat::find()->where(['s_id'=>$s_id,'id'=>$id])->one()){
            $seat->delete();
            return 'success';
        }else{
            return 'This seat is not exist';
        }
    }

    /**
     *
     */
    public function actionUpdate(){

        $id = Yii::$app->request->post('id');
        $s_id = Yii::$app->user->id;
        //$s_id = '1@qq.com';
        $res = Yii::$app->request;
        $seat = Seat::find()->where(['s_id'=>$s_id,'id'=>$id])->one();
        $seat->id = $res->post('id');
        $seat->count = $res->post('count');
        $seat->desc = $res->post('desc');
        if ($seat === null) {
            echo 'no data';
            throw new NotFoundHttpException;
        }
        if ($seat->save()) {
            echo 'success';
            // 获取用户输入的数据，验证并保存
        }
    }

    /**
     *修改座位状态 有没有人
     */
    public function actionSeatdown(){
        $id = $_POST['id'];
        $s_id = Yii::$app->user->id;
        //$s_id = '1@qq.com';
        $seat = Seat::find()->where(['s_id'=>$s_id,'id'=>$id])->one();
        $seat->status = 1;
        if ($seat === null) {
            echo 'no data';
            throw new NotFoundHttpException;
        }
        if ($seat->save()) {
            echo 'success';
            // 获取用户输入的数据，验证并保存
        }
    }

        public function actionSeatup(){
        $id = $_POST['id'];
        $s_id = Yii::$app->user->id;
        //$s_id = '1@qq.com';
        $seat = Seat::find()->where(['s_id'=>$s_id,'id'=>$id])->one();
        $seat->status = 0;
        if ($seat === null) {
            echo 'no data';
            throw new NotFoundHttpException;
        }
        if ($seat->save()) {
            echo 'success';
            // 获取用户输入的数据，验证并保存
        }
    }


    /**
     *
     */
    public function actionDisplay(){

        $s_id = Yii::$app->user->id;
        //$s_id = '1@qq.com';
        $dishes = Seat::find()->where(['s_id'=>$s_id])->asArray()->all();
        return json_encode($dishes);
    }

}