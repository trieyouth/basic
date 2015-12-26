<?php
namespace app\models;

use yii\db\ActiveRecord;

/**
 * Created by PhpStorm.
 * User: user
 * Date: 2015/12/23
 * Time: 17:58
 */

class Orderdish extends ActiveRecord{

    public static function tableName(){
        return 'order_dish';
    }

    public function rule(){
        return [
            [['o_id','d_id','price','count'],'required'],
        ];
    }
}