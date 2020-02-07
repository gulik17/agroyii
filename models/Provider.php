<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class Provider extends ActiveRecord {
    const STATUS_SUCCESS = 'STATUS_SUCCESS';
    const STATUS_DANGER = 'STATUS_DANGER';
    const STATUS_MODERATION = 'STATUS_MODERATION';
    const STATUS_NEW = 'STATUS_NEW';

    const LEGAL_TYPE_UL = 'LEGAL_TYPE_UL';
    const LEGAL_TYPE_FZ = 'LEGAL_TYPE_FZ';

    const LEGAL_STATUS_ACTIVE = 'LEGAL_STATUS_ACTIVE';
    const LEGAL_STATUS_DISABLED = 'LEGAL_STATUS_DISABLED';

    const SUBDIVISION_TYPE_HEAD = 'SUBDIVISION_TYPE_HEAD';
    const SUBDIVISION_TYPE_BRANCH = 'SUBDIVISION_TYPE_BRANCH';

    public static function tableName() {
        return 'provider';
    }

    public static function getStatus($i = null) {
        $list = array(
            self::STATUS_SUCCESS => "Подтвержден",
            self::STATUS_DANGER => "Не прошел модерацию",
            self::STATUS_MODERATION => "Заполнен, на модерации",
            self::STATUS_NEW => "Новый",
        );
        return $i ? $list[$i] : $list;
    }

    public static function getLegalType($i = null) {
        $list = array(
            self::LEGAL_TYPE_UL => "Юридическое лицо",
            self::LEGAL_TYPE_FZ => "Физическое лицо",
        );
        return $i ? $list[$i] : $list;
    }

    public static function getLegalStatus($i = null) {
        $list = array(
            self::LEGAL_STATUS_ACTIVE => "Действующая",
            self::LEGAL_STATUS_DISABLED => "Ликвидирована",
        );
        return $i ? $list[$i] : $list;
    }

    public static function getSubdivisionType($i = null) {
        $list = array(
            self::SUBDIVISION_TYPE_HEAD => "Головная организация",
            self::SUBDIVISION_TYPE_BRANCH => "Филиал",
        );
        return $i ? $list[$i] : $list;
    }

    public static function createNewItem($user_id) {
        $provider = new Provider(['scenario' => 'newsave']);
        $provider->user_id = $user_id;
        $provider->status = Provider::STATUS_NEW;
        $provider->rating = 0;
        $provider->ts_create = time();
        $provider->validate();
        $provider->save();
        return $provider;
    }

    /**
     * @return array правила валидации формы.
     */
    public function rules() {
        return [
            [['description', 'country_id', 'region_id', 'city_id', 'address', 'phone', 'email', 'site', 
                'name', 'full_name', 'legal_country_id', 'legal_region_id', 'legal_city_id',
                'head_name', 'head_position', 'legal_ts_register', 'legal_type', 'legal_status',
                'legal_inn', 'legal_ogrn', 'legal_kpp', 'subdivision_type', 'subdivision_branch',
                'legal_okved', 'legal_okopf', 'legal_opf'], 'default'],

            [['user_id', 'ts_create', 'status', 'rating'], 'required', 'on' => 'newsave'],

            [['description'], 'required', 'on' => 'tab1save'],

            [['country_id', 'region_id', 'city_id', 'address', 'phone', 'email', 'site'], 'required', 'on' => 'tab2save'],

            [['name', 'full_name', 'legal_country_id', 'legal_region_id', 'legal_city_id',
                'head_name', 'head_position', 'legal_ts_register', 'legal_type', 'legal_status',
                'legal_inn', 'legal_ogrn', 'legal_kpp', 'subdivision_type', 'subdivision_branch',
                'legal_okved', 'legal_okopf', 'legal_opf'], 'required', 'on' => 'tab3save'],
          //[['ts_create', 'legal_ts_register'], 'date'],
        ];
    }

    public function behaviors() {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'legal_ts_register',
                ],
                'value' => function() {
                    return strtotime($this->legal_ts_register);
                },
            ],
        ];
    }

    /**
     * Возвращает массив названий полей формы
     * 
     * @return array
     */
    public function attributeLabels() {
        return [
            'name' => 'Краткое наименование',
            'full_name' => 'Полное наименование',
            'description' => 'Общая информация',
            'rating' => 'Рейтинг',
            'status' => 'Статус',
            'country_id' => 'Страна',
            'region_id' => 'Регион',
            'city_id' => 'Населенный пункт',
            'address' => 'Адрес',
            'legal_country_id' => 'Страна',
            'legal_region_id' => 'Регион',
            'legal_city_id' => 'Населенный пункт',
            'legal_ts_register' => 'Дата регистрации',
            'legal_type' => 'Тип организации',
            'legal_status' => 'Статус организации',
            'legal_inn' => 'ИНН',
            'legal_ogrn' => 'ОГРН',
            'legal_kpp' => 'КПП',
            'subdivision_type' => 'Тип подразделения',
            'subdivision_branch' => 'Кол-во филиалов',
            'legal_okved' => 'Основной код ОКВЭД',
            'legal_okopf' => 'Код ОКОПФ',
            'legal_opf' => 'ОПФ',
            'head_name' => 'ФИО руководителя',
            'head_position' => 'Должность руководителя',
            'phone' => 'Телефон',
            'email' => 'E-mail',
            'site' => 'Сайт',
            'ts_create' => 'Дата регистрации', // Дата регистрации на сайте
        ];
    }
}