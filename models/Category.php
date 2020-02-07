<?php

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord {
    public static function tableName() {
        return 'category';
    }

    public function getProducts () {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

    public static function getCategoriesAndSubs($category_id) {
        $cat_branch[] = $category_id;
        $results = self::find()->indexBy('id')->asArray()->where(['parent_id' => $category_id])->all();
        if($results) {
            foreach ($results as $result) {
                $cat_branch[] = $result['id'];
                self::getCategoriesandSubs($result['id']);
            }
        }
        return $cat_branch;
    }
}