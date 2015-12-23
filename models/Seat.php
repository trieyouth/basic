<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2015/12/23
 * Time: 16:41
 */

namespace app\models;

use yii\db\ActiveRecord;

class Seat extends ActiveRecord{

    public function tableName(){
        return 'seat';
    }

    public function rule(){
        return [
            [],
        ];
    }
}