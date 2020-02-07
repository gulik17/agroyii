<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ForgotForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class ForgotForm extends Model {
    public $email;
    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            // email are both required
            [['email'], 'required'],
        ];
    }

    /**
     * Logs in a user using the provided email and password.
     * @return bool whether the user is logged in successfully
     */
    public function forgot() {
        //if ($this->validate()) {
            //return Yii::$app->user->login($this->getUser(), 3600 * 24 * 30);
        //}
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
