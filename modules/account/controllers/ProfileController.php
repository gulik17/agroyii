<?php

namespace app\modules\account\controllers;

use yii\web\Controller;
use Yii;
use app\models\Provider;

/**
 * Контроллер страницы объявлений
 *
 * @author Gulik
 */
class ProfileController extends AppAccountController {
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        Yii::$app->params['mainCss'] = 'profile';
        $this->setMeta('Профиль компании');
        if (!$provider = Provider::findOne(['user_id' => Yii::$app->user->id])) {
            $provider = Provider::createNewItem(Yii::$app->user->id);
        }
        if ($provider->load(Yii::$app->request->post())) {
            $scenarios = Yii::$app->request->post()['Provider']['scenarios'];
            if (in_array($scenarios, ['safe', 'tab1save', 'tab2save', 'tab3save'])) {
                $provider->setScenario($scenarios);
            } else {
                Yii::$app->session->setFlash('danger', 'Ошибка! Получены недопустимые данные');
                return $this->render('index', compact('provider'));
            }
            if ($provider->validate() && $provider->save()) {
                Yii::$app->session->setFlash('success', 'Данные сохранены');
                
            } else {
                Yii::$app->session->setFlash('danger', 'Ошибка! Не заполнены все необходимые поля');
            }
        }
        return $this->render('index', compact('provider'));
    }
}
