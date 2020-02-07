<?php

namespace app\models;

use yii\db\ActiveRecord;

class City extends ActiveRecord {
    public static function tableName() {
        return 'dir_city';
    }
    
    /**
     * Возвращает массив названий полей формы
     * 
     * @return array
     */
    public function attributeLabels() {
        return [
            'region_id' => 'Регион',
            'name' => 'Город',
        ];
    }
}