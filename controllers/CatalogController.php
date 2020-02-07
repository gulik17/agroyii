<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use yii\data\Pagination;
use Yii;

class CatalogController extends AppController {
    public function actionIndex() {
        $query = Product::find()->limit(9);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 9, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('Каталог продуктов');
        return $this->render('view', compact('products', 'pages'));
    }

    public function actionView($category_id) {
        $category = Category::findOne($category_id);
        if (empty($category)) {
            throw new \yii\web\HttpException('404', 'Категория не найдена');
        }
        $cad_ids = Category::getCategoriesAndSubs($category_id);
        $query = Product::find()->where(['IN', 'category_id', $cad_ids]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 9, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta($category->name, $category->keywords, $category->description);
        return $this->render('view', compact('products', 'pages'));
    }

    public function actionDetail($id) {
        $product = Product::findOne($id);
        if (empty($product)) {
            throw new \yii\web\HttpException('404', 'Товар не найден');
        }
        $this->setMeta($product->name, $product->keywords, $product->description);
        return $this->render('detail', compact('product'));
    }

    public function actionSearch() {
        $q = trim(Yii::$app->request->get('q'));
        if (!$q) {
            return $this->render('search');
        }
        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 8, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('products', 'pages', 'q'));
    }
}