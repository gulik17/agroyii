<?php

namespace app\modules\account\controllers;

use yii\web\Controller;
use Yii;
use app\models\Support;
use yii\data\Pagination;
use yii\helpers\Url;

/**
 * Контроллер страницы технической поддержки
 *
 * @author Gulik
 */
class SupportController extends AppAccountController {
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        $support = new Support();
        if ($support->load(Yii::$app->request->post()) && $product->save() ) {
            Yii::$app->session->setFlash('success', 'Сообщение отправлено', false);
            return $this->redirect(Url::to(['/account/support']));
        }
        Yii::$app->params['mainCss'] = 'support';
        $this->setMeta('Техническая поддержка');
        return $this->render('index', compact('support'));
    }
}
