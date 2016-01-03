<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2015/12/18
 * Time: 16:24
 */
namespace app\controllers;

use app\models\LoginForm;
use Yii;
use yii\base\Controller;
use yii\data\Pagination;
use yii\db\Query;
use app\models\Dish;
use yii\web\NotFoundHttpException;

class DishController extends Controller
{


    /**
     * @return string
     * 添加菜单
     */
    public function actionAdd()
    {
        $dish = new Dish();
        $res = Yii::$app->request;
        $dish->s_id = Yii::$app->user->id;
        $dish->dish_name = $res->post('dish_name');
        $dish->price = $res->post('price');
        $dish->discount = $res->post('discount');
        $dish->advice = $res->post('advice');
        $dish->desc = $res->post('desc');
        $dish->p_id = $res->post('p_id');
        $dish->sale_num = 0;
        if ($dish->validate() && $dish->save()) {
            return $this->render('add',['model'=>$dish]);
        } else {
            return $this->render('add',['model'=>$dish]);
        }
    }

    /**
     *删除 传入菜品id
     */
    public function actionDel()
    {
        if (Yii::$app->request->isAjax) {
            $id = Yii::$app->request->post('id');
            $s_id = Yii::$app->user->id;
            Dish::find()->where(['s_id' => $s_id, 'id' => $id])->one()->delete();
            return Yii::$app->response->redirect(['dish/dishplay']);
        }
    }


    /**
     *修改 传入菜品id还有需要修改的信息
     */
    public function actionUpdate()
    {

        $id = Yii::$app->request->post('dish_id');
        $res = Yii::$app->request;
        $dish = Dish::findOne($id);
        $dish->dish_name = $res->post('dish_name');
        $dish->price = $res->post('price');
        $dish->discount = $res->post('discount');
        $dish->advice = $res->post('advice');
        $dish->desc = $res->post('desc');
        $dish->p_id = $res->post('p_id');

        if ($dish === null) {
            throw new NotFoundHttpException;
        }
        if ($dish->save()) {
            echo 'success';
            // 获取用户输入的数据，验证并保存
        }
    }

    public function actionDisplay()
    {

        $store_id = Yii::$app->user->id;

        $query = (new Query())->from('dish')
            ->where(['s_id' => $store_id]);

        $pagination = new Pagination([
            'defaultPageSize' => 8,
            'totalCount' => $query->count(),
        ]);

        $res = $query->orderBy('dish_id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('display', ['list' => $res, 'page' => $pagination]);
    }
}