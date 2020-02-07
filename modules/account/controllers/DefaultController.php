<?php

namespace app\modules\account\controllers;

use yii\web\Controller;
use Yii;

/**
 * Начальный контроллер модуля личного кабинета
 *
 * @author Gulik
 */
class DefaultController extends AppAccountController {
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        Yii::$app->params['mainCss'] = 'account';
        $this->setMeta('Личный кабинет');
        return $this->render('index');
    }
}
