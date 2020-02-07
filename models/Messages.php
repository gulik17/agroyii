<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Messages extends ActiveRecord {
    public $group_id;

    public static function tableName() {
        return 'messages';
    }
    
    public static function getUnreadCount($group = null) {
        if ($group) {
            $res = Messages::findAll(['m_group' => $group, 'ts_read' => null, 'to_id' => Yii::$app->getUser()->id]);
        } else {
            $res = Messages::findAll(['ts_read' => null, 'to_id' => Yii::$app->getUser()->id]);
        }
        return count($res);
    }
    
    public static function getUnreadName($group = null) {
        if ($group) {
            $res = Messages::find(['m_group' => $group, 'ts_read' => null])->groupBy('m_group')->all();
        } else {
            $res = Messages::find(['ts_read' => null])->groupBy('m_group')->all();
        }
        $str = "";
        foreach ($res as $key => $r) {
            $str .= ($key === 0) ? $r->providerTo->name : ", ".$r->providerTo->name;
        }
        return $str;
    }

    /**
     * Возвращает массив названий полей формы
     * 
     * @return array
     */
    public function attributeLabels() {
        return [
            'from_id' => 'Отправитель',
            'to_id' => 'Получатель',
            'm_group' => 'Группа',
            'message' => 'Сообщение',
            'ts_create' => 'Отправлено',
            'ts_read' => 'Прочитано',
        ];
    }
    
    public function getProviderFrom() {
        return $this->hasOne(Provider::className(), ['id' => 'from_id']);
    }
    
    public function getProviderTo() {
        return $this->hasOne(Provider::className(), ['id' => 'to_id']);
    }
    
    /**
     * Событие вызываемое перед сохранением записи в БД
     * @param type $insert
     * @return type
     */
    public function beforeSave($insert) {
        if ($insert) {
            $this->from_id = Yii::$app->getUser()->id;
            $this->m_group = $this->group_id;
            $this->ts_create = time();
        }
        return parent::beforeSave($insert);
    }
}