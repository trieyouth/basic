<?php

namespace app\models;

use Yii;
use yii\base\Model;


class SignupForm extends Model
{
    public $username;
    public $pwd;
    public $pwd2;
    public $real_name;
    public $id_card;
    public $passport;
    public $avatar;
    public $add;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'password','passport','add','id_card','real_name' ], 'required','message'=>'请输入完整的信息'],
            ['username','email','用户名必须是邮箱格式'],
			['pwd','string','length','min'=>6,'max'=>18,'message'=>'密码长度不合适'],
			['pwd2','compare','compareAttribute'=>'pwd','message'=>'两次输入密码不一样'],
			['real_name','string','length','min'=>2,'max'=>4,'message'=>'请输入正确姓名'],
			['add','string','max'=>255],
			['birth','match','pattern'=>'%^\d{4}(\-|\/|\.)\d{1,2}\1\d{1,2}$%',
			    'allowEmpty'=>true, 'message'=>'生日必须是年-月-日格式'],
			['gender','boolean'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
