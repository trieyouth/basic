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


    public function rule(){
        return [
            [['id','s_id','status','count'],'required'],
            ['s_id','email'],
            ['status','integer'],
            ['count','integer'],
            ['desc','string','max'=>200],
        ];
    }

    /**
     *检验是否有重复的位置
     */
    public function validateId(){
         if(!$this->hasErrors()){
            if(isset($this->id)){
                $seat = $this->find()->where(['s_id'=>$this->s_id,'id'=>$this->id])->one();
                if(isset($seat)){
                    $this->addError('座位已存在');
                }
            }
        }
    }
}