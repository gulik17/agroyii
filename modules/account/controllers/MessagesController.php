<?php

namespace app\modules\account\controllers;

use Yii;
use app\models\Messages;
use yii\data\Pagination;

/**
 * Контроллер страницы сообщений
 *
 * @author Gulik
 */
class MessagesController extends AppAccountController {
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        Yii::$app->params['mainCss'] = 'messages';
        $this->setMeta('Сообщения');
        $query= Messages::findBySql('SELECT * FROM (SELECT * FROM `messages` WHERE `from_id` = '.Yii::$app->getUser()->id.' OR `to_id` = '.Yii::$app->getUser()->id.' ORDER BY id DESC) AS t GROUP BY `t`.`m_group`');
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 9, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $messages = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index', compact('messages', 'pages'));
    }

    public function actionDialog($id) {
        $dialog = Messages::findAll(['m_group' => $id]);
        foreach ($dialog as $key => &$item) {
            if (!$item->ts_read && $item->to_id == Yii::$app->getUser()->id) {
                $item->ts_read = time();
                $item->save();
            }
        }
        $this->layout = false;
        return $this->render('dialog', compact('dialog'));
    }
}