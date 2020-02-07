<?php

namespace app\models;

use yii\db\ActiveRecord;

class Support extends ActiveRecord {
    public $imageFiles;

    public static function tableName() {
        return 'support';
    }

    /**
     * Возвращает массив названий полей формы
     * 
     * @return array
     */
    public function attributeLabels() {
        return [
            'user_id' => 'Владелец',
            'theme' => 'Тема обращения',
            'name' => 'Ваше имя',
            'email' => 'E-mail для ответа',
            'files' => 'Файлы',
            'description' => 'Описание проблемы',
            'ts_create' => 'Создан',
            'ts_close' => 'Закрыт',
        ];
    }

    /**
     * Событие вызываемое перед сохранением записи в БД
     * @param type $insert
     * @return type
     */
    public function beforeSave($insert) {
        if ($insert) {
            $this->user_id = Yii::$app->getUser()->id;
            $this->ts_create = time();
            $this->imageFiles = UploadedFile::getInstances($this, 'imageFiles');
            if ( is_array($this->imageFiles) && count($this->imageFiles) ) {
                if (!$this->upload()) {
                    Yii::$app->session->setFlash('danger', 'Ошибка загрузки файлов', false);
                }
            }
        }
        return parent::beforeSave($insert);
    }

    public function upload() {
        if ($this->validate()) {
            $path = 'images/support/' . $this->ts_create;
            if ( !file_exists($path) ) {
                mkdir($path, 0755);
            }
            $files = [];
            foreach ($this->imageFiles as $file) {
                $randFileName = rand(1000, 9999) . '.' . $file->extension;
                $files[] = $randFileName;
                $file->saveAs($path . '/' . $randFileName);
            }
            $this->files = serialize($files);
            return true;
        } else {
            return false;
        }
    }
}