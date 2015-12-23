<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2015/12/18
 * Time: 16:24
 */
namespace app\controllers;

use Yii;
use yii\base\Controller;
use yii\db\Query;
use app\models\Dish;

class DishController extends Controller{


    /**
     * @return string
     * 添加菜单
     */
    public function actionAdd(){


        $dish = new Dish();
        $res = Yii::$app->request;
        $dish->s_id = '1@qq.com';
        $dish->dish_name = $res->post('dish_name');
        $dish->price = $res->post('price');
        $dish->discount = $res->post('discount');
        $dish->advice = $res->post('advice');
        $dish->desc = $res->post('desc');
        $dish->p_id = $res->post('p_id');
        $dish->sale_num = 0;
        if($dish->validate()&&$dish->save()){
            return 'success';
        }else{
            return 'fales';
        }
    }

    /**
     *删除 传入菜品id
     */
    public function actionDel(){
        $id = Yii::$app->request->post('id');
        $s_id = Yii::$app->user->id;
        Dish::find()->where(['s_id'=>$s_id,'id'=>$id])->one()->delete();
    }

    /**
     *修改 传入菜品id还有需要修改的信息
     */
    public function actionUpdate(){

        $id = Yii::$app->request->post('dish_id');
        $res = Yii::$app->request;
        $dish = new Dish();
        $dish = Dish::findOne($id);
        $dish->dish_name = $res->post('dish_name');
        $dish->price = $res->post('price');
        $dish->discount = $res->post('discount');
        $dish->advice = $res->post('advice');
        $dish->desc = $res->post('desc');
        $dish->p_id = $res->post('p_id');
        if ($dish === null) {
            echo 'no data';
            throw new NotFoundHttpException;
        }
        if ($dish->save()) {
            echo 'success';
            // 获取用户输入的数据，验证并保存
        }

    }

    public function actionDisplay(){
        $store_id = Yii::$app->user->id;
        $res = (new Query())->from('dish')
            ->where(['s_id' =>$store_id])
            ->all();
        return json_encode($res);
    }
}