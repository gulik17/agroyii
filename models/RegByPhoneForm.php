<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * RegByPhoneForm is the model behind the registration form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RegByPhoneForm extends Model {
    public $phone;
    public $code;
    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            // email and password are both required
            [['phone', 'code'], 'required'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'phone' => 'Мобильный телефон',
            'code' => 'Код из SMS',
        ];
    }

    /**
     * Logs in a user using the provided phone and code.
     * @return bool whether the user is logged in successfully
     */
    public function login() {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), 3600 * 24 * 30);
        }
        return false;
    }

    /**
     * Finds user by [[phone]]
     *
     * @return User|null
     */
    public function getUser() {
        if ($this->_user === false) {
            $this->_user = User::findByPhone($this->phone);
        }
        return $this->_user;
    }
}
