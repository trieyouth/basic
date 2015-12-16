<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SignupForm extends Model
{
    public $id;
    public $pwd;
    public $pwd2;
    public $real_name;
    public $id_card;
    public $passport;
    public $avatar;
    public $add;
    public $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['id', 'pwd','pwd2','passport','add','id_card','real_name' ], 'required','message'=>'请输入完整的信息'],
            ['id','email','message'=>'邮箱格式不正确'],
            ['id','validateId','message'=>'该用户已存在'],
			['pwd','string','max'=>18, 'min'=>6, 'tooLong'=>'密码请输入长度为6-18位字符', 'tooShort'=>'密码请输入长度为6-18位字符'],
			['pwd2','compare','compareAttribute'=>'pwd','message'=>'两次输入密码不一样'],
			['real_name','string','min'=>2,'max'=>4,'message'=>'请输入正确姓名'],
			['add','string','max'=>255],
        ];
    }

    //检验账号有没有被注册过
    public function validateId(){
        if(!$this->hasErrors()){
            if(isset($id)){
                if($this->getUser() != false){
                    $this->addError($id,'该邮箱已注册');
                }
            }
        }
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findIdentity($this->id);
        }
        return $this->_user;
    }

    public function signup(){
        if($this->validate()){
            $user = new User;
            $user->id = $this->id;
            $user->pwd = $this->pwd;
            $user->name = $this->real_name;
            $user->id_card = $this->id_card;
            $user->address = $this->add;
            $user->passport = $this->passport;
            $user->avatar = $this->avatar;
            $user->save();
        }
        return false;
    }
}
