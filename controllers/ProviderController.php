<?php

namespace app\controllers;

use app\models\Provider;
use yii\data\Pagination;

class ProviderController extends AppController {
    public function actionIndex() {
        $query = Provider::find();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 9, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $providers = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('Каталог поставщиков');
        return $this->render('index', compact('providers', 'pages'));
    }

    public function actionView($id) {
        $provider = Provider::findOne($id);
        if (empty($provider)) {
            throw new \yii\web\HttpException('404', 'Товар не найдена');
        }
        $this->setMeta($provider->name);
        return $this->render('detail', compact('provider'));
    }
}