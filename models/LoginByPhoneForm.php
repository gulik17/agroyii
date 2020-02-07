<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginByPhoneForm extends Model {
    public $phone;
    public $code;
    private $_user = false;
    
    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            // phone and code are both required
            [['phone', 'code'], 'required'],
            // code is validated by validateCode()
            ['code', 'validateCode'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'phone' => 'Мобильный телефон',
            'code' => 'Код из SMS',
        ];
    }

    /**
     * Validates the code.
     * This method serves as the inline validation for code.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateCode($attribute, $params) {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validateCode($this->code)) {
                $this->addError($attribute, 'Неверный логин или пароль.');
            }
        }
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
