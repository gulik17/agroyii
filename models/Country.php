<?php

namespace app\models;

use yii\db\ActiveRecord;

class Country extends ActiveRecord {
    public static function tableName() {
        return 'dir_country';
    }
    
    /**
     * Возвращает массив названий полей формы
     * 
     * @return array
     */
    public function attributeLabels() {
        return [
            'name' => 'Страна',
            'iso_code' => 'Код ISO',
        ];
    }
}