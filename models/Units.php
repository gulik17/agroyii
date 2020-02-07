<?php

namespace app\models;

use \yii\base\Model;

class Units extends Model {
    const UNITS_TON = 'UNITS_TON';
    const UNITS_KILOGRAM = 'UNITS_KILOGRAM';
    const UNITS_GRAM = 'UNITS_GRAM';
    
    public static function getUnits($i = null) {
        $list = array(
            "" => "",
            self::UNITS_TON => "Тонна",
            self::UNITS_GRAM => "Грамм",
            self::UNITS_KILOGRAM => "Килограмм",
        );
        return $i ? $list[$i] : $list;
    }
    
    public static function getShortUnits($i = null) {
        $list = array(
            "" => "",
            self::UNITS_TON => "т.",
            self::UNITS_GRAM => "гр.",
            self::UNITS_KILOGRAM => "кг.",
        );
        return $i ? $list[$i] : $list;
    }
}