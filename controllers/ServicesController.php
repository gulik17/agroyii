<?php

namespace app\controllers;

use app\models\Category;
use app\models\Service;
use yii\data\Pagination;
use Yii;

class ServicesController extends AppController {
    public function actionIndex() {
        $query = Service::find();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 9, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $services = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('Каталог услуг');
        return $this->render('view', compact('services', 'pages'));
    }

    public function actionView($category_id) {
        $category = Category::findOne($category_id);
        if (empty($category)) {
            throw new \yii\web\HttpException('404', 'Категория не найдена');
        }
        $query = Service::find()->where(['category_id' => $category_id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 9, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $services = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta($category->name, $category->keywords, $category->description);
        return $this->render('view', compact('services', 'category', 'pages'));
    }
    
    public function actionDetail($id) {
        $service = Service::findOne($id);
        if (empty($service)) {
            throw new \yii\web\HttpException('404', 'Услуга не найдена');
        }
        return $this->render('detail', compact('service'));
    }
}