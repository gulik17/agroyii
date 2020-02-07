<?php

namespace app\models;

use yii\db\ActiveRecord;

class Grade extends ActiveRecord {
    public static function tableName() {
        return 'dir_grade';
    }
    
    public function getProducts () {
        return $this->hasMany(Product::className(), ['grade_id' => 'id']);
    }

    /**
     * Возвращает массив названий полей формы
     * 
     * @return array
     */
    public function attributeLabels() {
        return [
            'name' => 'Наименование',
            'status' => 'Статус',
        ];
    }
}