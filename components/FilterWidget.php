<?php

namespace app\components;

use yii\base\Widget;

class FilterWidget extends Widget {
    public $tpl;

    public function init() {
        parent::init();
        if ($this->tpl === null) {
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run() {
        return $this->tpl;
    }
}