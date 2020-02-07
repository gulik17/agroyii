<?php
/**
 * Description of FavoritesController
 *
 * @author Gulik
 */

namespace app\controllers;

use app\models\Favorites;
use yii\data\Pagination;
use app\models\Product;
use Yii;

class FavoritesController extends AppController {
    /**
     * Displays Favorites page.
     */
    public function actionIndex() {
        $this->setMeta('Избранное');
        $session = Yii::$app->session;
        $session->open();
        if (!count($_SESSION['favorites'])) {
            $pages = new \stdClass();
            $pages->totalCount = 0;
            return $this->render('view', compact('pages'));
        }

        $query = Product::find()->where(['in', 'id', $_SESSION['favorites']])->limit(9);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 9, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $favorites = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('view', compact('favorites', 'pages'));
    }
    
    public function actionAdd() {
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if (empty($product)) {
            return false;
        }
        $session = Yii::$app->session;
        $session->open();
        $favorites = new Favorites();
        $favorites->AddToFavorites($product);
        return count($_SESSION['favorites']);
    }
    
    public function actionDel() {
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if (empty($product)) {
            return false;
        }
        $session = Yii::$app->session;
        $session->open();
        $favorites = new Favorites();
        $favorites->DelFromFavorites($product);
        return count($_SESSION['favorites']);
    }
}
