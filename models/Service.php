<?php

namespace app\models;

use yii\db\ActiveRecord;

class Service extends ActiveRecord {
    public static function tableName() {
        return 'service';
    }
    
    public function getCategory () {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}