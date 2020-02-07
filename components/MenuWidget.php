<?php

namespace app\components;

use Yii;
use yii\base\Widget;
use app\models\Category;

class MenuWidget extends Widget {
    public $tpl;
    public $data;
    public $model;
    public $tree;
    public $menuHtml;
    
    public function init() {
        parent::init();
        if ($this->tpl === null) {
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }
    
    public function run() {
        //get Cache
        $menu = Yii::$app->cache->get($this->tpl);
        if ($menu) {
            return $menu;
        }

        $this->data = Category::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        //set cache
        Yii::$app->cache->set($this->tpl, $this->menuHtml, 60);
        return $this->menuHtml;
    }

    protected function getTree() {
        $tree = [];
        foreach ($this->data as $id=>&$node) {
            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = '') {
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category, $tab);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab) {
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

    protected function getChildMenuHtml($tree, $tab = '') {
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catChildToTemplate($category, $tab);
        }
        return $str;
    }

    protected function catChildToTemplate($category, $tab) {
        ob_start();
        include __DIR__ . '/menu_tpl/child_' . $this->tpl;
        return ob_get_clean();
    }
}