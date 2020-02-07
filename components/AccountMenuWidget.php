<?php

namespace app\components;

use Yii;
use yii\base\Widget;

class AccountMenuWidget extends Widget {
    public $tpl;
    public $data;
    public $active;
    public $menuHtml;
    
    public function init() {
        parent::init();
        if ($this->tpl === null) {
            $this->tpl = 'amenu';
        }
        $this->tpl .= '.php';
    }
    
    public function run() {
        //get Cache
        $menu = Yii::$app->cache->get($this->tpl);
        if ($menu) {
            return $menu;
        }
        $this->data = [
                ['name' => 'Ваши объявления', 'link' => '/account/ads', 'img' => 'paper'],
                ['name' => 'Сообщения', 'link' => '/account/messages', 'img' => 'talk'],
                ['name' => 'Ваш счет', 'link' => '/account/balance', 'img' => 'ruble'],
                ['name' => 'Закладки', 'link' => '/favorites', 'img' => 'bookmark2'],
                ['name' => 'Подписки', 'link' => '/account/subscriptions', 'img' => 'shoping-list'],
                ['name' => 'Профиль компании', 'link' => '/account/profile', 'img' => 'name'],
                ['name' => 'Техническая поддержка', 'link' => '/account/support', 'img' => 'question'],
                ['name' => 'Выйти', 'link' => '/site/logout', 'img' => 'question'],
            ];
        $this->menuHtml = $this->getMenuHtml($this->data);
        //set cache
        Yii::$app->cache->set('amenu', $this->menuHtml, 60);
        return $this->menuHtml;
    }
    
    protected function getMenuHtml($data) {
        $str = '';
        foreach ($data as $item) {
            $str .= $this->catToTemplate($item);
        }
        return $str;
    }
    
    protected function catToTemplate($item) {
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }
}