<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login'], 'required'],
            [['login', 'name', 'password', 'auth_token', 'auth_key'], 'string', 'max' => 255],
            [['login'], 'unique'],
            [['auth_token','auth_key'], 'unique']
        ];
    }

    public function beforeValidate()
    {
        if ($this->getAuthToken() == '')
            $this->generateAuthToken();

        if ($this->getAuthKey() == '')
            $this->generateAuthKey();

        return parent::beforeValidate();
    }

    public function generateAuthToken()
    {
        $this->auth_token = Yii::$app->security->generateRandomString();
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString(30);
    }

    public function getAuthToken()
    {
        return $this->auth_token;
    }

    public function getId()
    {
        return $this->id;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    public function getRole()
    {
        return $this->hasOne(AuthAssignment::class, ['user_id' => 'us_id']);
    }

    public function getAuthItem()
    {
        return $this->hasOne(AuthItem::class, ['name' => 'item_name'])
            ->via('role');
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}
