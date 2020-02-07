<?php

namespace app\modules\account\controllers;

use app\controllers\AppController;
use Yii;

class AppAccountController extends AppController {

    function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        if (Yii::$app->user->isGuest) {
            Yii::$app->session->setFlash('error', 'Необходимо авторизоваться');
            return $this->goHome();
        }
    }

}