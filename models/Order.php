<?php
namespace app\models;

use yii\db\ActiveRecord;

/**
 * Created by PhpStorm.
 * User: user
 * Date: 2015/12/23
 * Time: 17:58
 */

class Order extends ActiveRecord{

    public function rule(){
        return [
            [['s_id','seat_id','b_time','price','count'],'required'],
            ['s_id','email'],
            ['price','double'],
            ['desc','string','max'=>200],
            ['b_time']
        ];
    }
}