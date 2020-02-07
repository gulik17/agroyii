<?php

namespace app\modules\account\controllers;

use yii\web\Controller;
use Yii;

/**
 * Контроллер страницы баланса пользователя
 *
 * @author Gulik
 */
class BalanceController extends AppAccountController {
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        $this->setMeta('Ваш счет');
        return $this->render('index');
    }
}
