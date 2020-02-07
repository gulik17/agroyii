<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use yii\web\UploadedFile;

class Product extends ActiveRecord {
    public $imageFiles;
            
    const STATUS_ACTIVE = 'STATUS_ACTIVE';
    const STATUS_EXPIRED = 'STATUS_EXPIRED';
    const STATUS_MODERATION = 'STATUS_MODERATION';
    const STATUS_NEW = 'STATUS_NEW';

    public static function tableName() {
        return 'product';
    }
    
    public static function getStatus($i = null) {
        $list = array(
            self::STATUS_ACTIVE => "Активно",
            self::STATUS_EXPIRED => "Истекло",
            self::STATUS_MODERATION => "На модерации",
            self::STATUS_NEW => "Новый",
        );
        return $i ? $list[$i] : $list;
    }

    /**
     * @return array правила валидации формы.
     */
    public function rules() {
        return [
            [['provider_id', 'country_origin_id', 'category_id', 'grade_id',
                'caliber', 'caliber_units', 'quantity', 'quantity_units', 'packing', 'packing_units',
                'price', 'price_units', 'price_from', 'content', 'info', 'status', 'country_id', 'region_id', 'city_id'], 'default'],
            [['provider_id', 'country_origin_id', 'category_id', 'grade_id', 'country_id', 'region_id', 'city_id'], 'integer'],
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 10],
        ];
    }

    public function getCategory () {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getGrade () {
        return $this->hasOne(Grade::className(), ['id' => 'grade_id']);
    }
    
    public function getProvider () {
        return $this->hasOne(Provider::className(), ['id' => 'provider_id']);
    }
    
    public function getCountryOrigin () {
        return $this->hasOne(Country::className(), ['id' => 'country_origin_id']);
    }
    
    public function getCountry () {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }
    
    public function getRegion () {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }
    
    public function getCity () {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * Возвращает массив названий полей формы
     * 
     * @return array
     */
    public function attributeLabels() {
        return [
            'provider_id' => 'Название производителя',
            'country_origin_id' => 'Страна происхождения',
            'category_id' => 'Раздел каталога',
            'grade_id' => 'Сорт',
            'caliber' => 'Калибр',
            'caliber_units' => 'Калибр ед.и',
            'quantity' => 'Общее количество товара',
            'quantity_units' => 'Количество ед.и',
            'packing' => 'Фасовка',
            'packing_units' => 'Фасовка ед.и',
            'price' => 'Цена',
            'price_units' => 'Цена ед.и',
            'price_from' => 'Добавить к цене «от»',
            'content' => 'Описание в свободной форме',
            'info' => 'Информация о доставке',
            'imageFiles' => 'Фото',
            'status' => 'Статус',
            'ts_create' => 'Дата добавления',
            'ts_update' => 'Дата изменения',
            'country_id' => 'Страна',
            'region_id' => 'Регион',
            'city_id' => 'Город',
        ];
    }
    
    public function beforeSave($insert) {
        if ($insert) {
            $this->provider_id = Yii::$app->getUser()->id;
            $this->status = Product::STATUS_NEW;
            $this->ts_create = time();
        }
        $this->ts_update = time();
        $this->name = $this->category->name . " «" . $this->grade->name . "»";
        if ($this->caliber) {
            $this->name .= ", калибр " . $this->caliber . Units::getShortUnits($this->caliber_units);
        }

        $this->imageFiles = UploadedFile::getInstances($this, 'imageFiles');
        if ( is_array($this->imageFiles) && count($this->imageFiles) ) {
            if (!$this->upload()) {
                Yii::$app->session->setFlash('danger', 'Ошибка загрузки файлов', false);
            }
        }
        return parent::beforeSave($insert);
    }
    
    public function upload() {
        if ($this->validate()) {
            $path = 'images/products/' . $this->ts_create;
            if ( !file_exists($path) ) {
                mkdir($path, 0755);
            }
            $files = [];
            foreach ($this->imageFiles as $file) {
                $randFileName = rand(1000, 9999) . '.' . $file->extension;
                $files[] = $randFileName;
                $file->saveAs($path . '/' . $randFileName);
            }
            $this->img = serialize($files);
            return true;
        } else {
            return false;
        }
    }
}