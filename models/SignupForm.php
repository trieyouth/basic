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
    public $_user;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['id', 'password','passport','add','id_card','real_name' ], 'required','message'=>'请输入完整的信息'],
            ['id','email','用户名必须是邮箱格式'],
            ['id','validateId','message'=>'该用户已存在'],
			['pwd','string','length','min'=>6,'max'=>18,'message'=>'密码长度不合适'],
			['pwd2','compare','compareAttribute'=>'pwd','message'=>'两次输入密码不一样'],
			['real_name','string','length','min'=>2,'max'=>4,'message'=>'请输入正确姓名'],
			['add','string','max'=>255],
			['birth','match','pattern'=>'%^\d{4}(\-|\/|\.)\d{1,2}\1\d{1,2}$%',
			    'allowEmpty'=>true, 'message'=>'生日必须是年-月-日格式'],
			['gender','boolean'],
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
            $user->postport = $this->passport;
            $user->avatar = $this->avatar;
            $user->save();
        }
        return false;
    }
}
