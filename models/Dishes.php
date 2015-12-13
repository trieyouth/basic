<?php

namespace app\models;

use Yii;
use yii\base\Model;


class Dishes extends Model
{
    public $dish_name;
    public $price;
    public $discount;
    public $advice;
    public $desc;
    public $picture;
    public $sale_num = 0;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['dish_name','price'],'require'],
            ['dish_name','length','max'=>10],
            ['pirce','integer'],
        ];
    }



}
