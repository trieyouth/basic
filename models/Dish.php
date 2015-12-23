<?php

namespace app\models;



use yii\db\ActiveRecord;

class Dishes extends ActiveRecord
{
    /**
     * @return string
     */
    public function tableName()
    {
        return 'dish';
    }

    public function rules()
    {
        return [
            [['dish_name', 'price'], 'require'],
            ['dish_name', 'length', 'max' => 10],
        ];
    }

    /**
     * 还要获取当前id
     */
    public function add()
    {

        if ($this->validate()) {
            $this->save();
        }
    }

    /**
     *修改 传入菜品id还有需要修改的信息
     */
    public function update()
    {

        $dishes = new Dishes();
        if ($dishes->load(YII::$app->request->post()) && $dishes->validate()) {
            $dishes->save();
        }

    }

}
