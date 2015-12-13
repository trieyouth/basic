<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'store';
    }//会去找这个表名

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)//在当前表中寻找当前$id 默认在主键
    {
        $user = static::findOne($id);
        if($user === null) {

        }else{
        }
        return $user;
    }

    /**
     * @inheritdoc
     */

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['token'=>$token]);
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['name'=>$username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        $user = $this->find();
        return $this->pwd === $password;
    }
}
