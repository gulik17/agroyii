<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * RegByEmailForm is the model behind the registration form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RegByEmailForm extends Model {
    public $email;
    public $password;
    public $password2;
    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            // email and password are both required
            [['email', 'password', 'password2'], 'required'],
        ];
    }

    public function attributeLabels() {
        return [
            'email' => 'E-mail',
            'password' => 'Пароль',
            'password2' => 'Подтверждение пароля',
        ];
    }

    /**
     * Logs in a user using the provided email and password.
     * @return bool whether the user is logged in successfully
     */
    public function login() {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), 3600 * 24 * 30);
        }
        return false;
    }

    /**
     * Finds user by [[email]]
     *
     * @return User|null
     */
    public function getUser() {
        if ($this->_user === false) {
            $this->_user = User::findByEmail($this->email);
        }
        return $this->_user;
    }
}
