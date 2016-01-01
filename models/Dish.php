<?php

namespace app\models;

use yii\db\ActiveRecord;


class Dish extends ActiveRecord
{

    public static function tableName()
    {
        return 'dish';
    }

    public function rules()
    {
        return [
            [['dish_name', 'price'], 'required'],
            ['dish_name','string','max'=>18, 'min'=>2],
            ['s_id','email'],
            ['price','double'],
            ['discount','double','max'=>1],
            ['advice','string','max'=>100],
            ['desc','string','max'=>200],
            ['p_id','string','max'=>36],
        ];
    }


}
