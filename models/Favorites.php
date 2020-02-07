<?php

namespace app\models;

use yii\db\ActiveRecord;

class Favorites extends ActiveRecord {
    public static function tableName() {
        return 'favorites';
    }
    
    public function AddToFavorites($product) {
        if (!isset($_SESSION['favorites'][$product->id])) {
            $_SESSION['favorites'][$product->id] = $product->id;
        }
    }
    
    public function DelFromFavorites($product) {
        if (isset($_SESSION['favorites'][$product->id])) {
            unset($_SESSION['favorites'][$product->id]);
        }
    }
}