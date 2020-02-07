<?php

namespace app\models;

use yii\db\ActiveRecord;

class Region extends ActiveRecord {
    public static function tableName() {
        return 'dir_region';
    }
   
    /**
     * Возвращает массив названий полей формы
     * 
     * @return array
     */
    public function attributeLabels() {
        return [
            'region_id' => 'Страна',
            'name' => 'Регион',
        ];
    }
}