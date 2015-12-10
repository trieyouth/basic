<?php

/**
 * Created by PhpStorm.
 * User: youth
 * Date: 15-12-10
 * Time: 下午3:54
 */
namespace app\models;

use yii\base\Model;

class EntryForm extends Model{
    public $name;
    public $email;

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
}