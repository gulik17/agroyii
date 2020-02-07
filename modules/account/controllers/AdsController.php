<?php

namespace app\modules\account\controllers;

use Yii;
use app\models\Product;
use yii\data\Pagination;
use yii\helpers\Url;

/**
 * Контроллер страницы объявлений
 *
 * @author Gulik
 */
class AdsController extends AppAccountController {
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        Yii::$app->params['mainCss'] = 'account';
        $this->setMeta('Ваши объявления');
        $query = Product::find()->where(['provider_id' => Yii::$app->getUser()->id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 9, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index', compact('products', 'pages'));
    }

    public function actionAdd() {
        $product = new Product();
        if ($product->load(Yii::$app->request->post()) && $product->save() ) {
            Yii::$app->session->setFlash('success', 'Данные сохранены', false);
            return $this->redirect(Url::to(['/account/ads']));
        }
        Yii::$app->params['mainCss'] = 'advert';
        $this->setMeta('Добавить объявление');
        return $this->render('add', compact('product'));
    }
    
    public function actionEdit($id) {
        $product = Product::findOne(['id' => $id, 'provider_id' => Yii::$app->getUser()->id]);
        if (empty($product)) {
            //throw new \yii\web\HttpException('404', 'Продукт не найден');
            Yii::$app->session->setFlash('danger', 'Продукт не найден');
            return $this->redirect(Url::to(['/account/ads']));
        }
        if ($product->load(Yii::$app->request->post()) && $product->save() ) {
            Yii::$app->session->setFlash('success', 'Данные сохранены', false);
            return $this->redirect(Url::to(['/account/ads']));
        }
        Yii::$app->params['mainCss'] = 'advert';
        $this->setMeta('Редактирование объявления');
        return $this->render('add', compact('product'));
    }
    
    public function actionDel($id) {
        $product = Product::findOne(['id' => $id, 'provider_id' => Yii::$app->getUser()->id]);
        if ( empty($product) ) {
            //throw new \yii\web\HttpException('404', 'Продукт не найден');
            Yii::$app->session->setFlash('danger', 'Продукт не найден');
        }
        if ( $product->delete() ) {
            Yii::$app->session->setFlash('success', 'Объявление удалено');
        }
        return $this->redirect(Url::to(['/account/ads']));
    }
}
