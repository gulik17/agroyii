<?php

function debug($arr, $stop = false) {
    echo '<pre>' . print_r($arr, true) . '</pre>';
    if ($stop) {
        die();
    }
}

function getFavorites($id) {
    if ((isset($_SESSION['favorites'])) && (array_key_exists($id, $_SESSION['favorites']))) {
        return true;
    } else {
        return false;
    }
}

/**
 * 
 * @param type $value
 * @return type
 */
function mobilephone($value) {
    $strPhone = "+";
    $strPhone .= substr($value, 0, 1);
    $strPhone .= " (";
    $strPhone .= substr($value, 1, 3);
    $strPhone .= ") ";
    $strPhone .= substr($value, 4, 3);
    $strPhone .= "-";
    $strPhone .= substr($value, 7, 2);
    $strPhone .= "-";
    $strPhone .= substr($value, 9, strlen($value) - 9);
    return $strPhone;
}

/**
 * Форматирует телефон ( 79885001122 => 7 (988) 500-11-22 )
 * @param type $value
 * @return type
 */
function phoneFormat($input) {
    $strPhone  = substr($input, 0, 1) . " (" . substr($input, 1, 3) . ") ";
    $strPhone .= substr($input, 4, 3) . "-" . substr($input, 7, 2);
    $strPhone .= "-" . substr($input, 9, strlen($input) - 9);
    return $strPhone;
}

/**
 * Обработка номера телефона ( +8(988) 500-11-22 => 79885001122 )
 * 
 * @param type $phone
 * @return type
 */
function preparePhone($phone) {
    $phone = str_replace(array(' ', '+', '-', '(', ')'), '', $phone);
    if (substr($phone, 0, 1) == '8' || substr($phone, 0, 1) == '7') {
        $phone = '7' . substr($phone, 1, strlen($phone) - 1);
    } else if (strlen($phone) == 10) {
        $phone = '7' . $phone;
    }
    $phone = (float) $phone;
    $phone = strval($phone);
    return $phone;
}

function humanDate($date = null) {
    if (!$date) {
        $date = time();
    }
    $diff = time() - $date;
    
    $days = ($diff < 0) ? ceil($diff / 86400) : floor($diff / 86400);
    $hd = "";
    switch ($days) {
        case 0:
            $hd = "сегодня в " . date('H:i', $date);
            break;
        case 1:
            $hd = "вчера в " . date('H:i', $date);
            break;
        case 2:
            $hd = "позавчера в " . date('H:i', $date);
            break;
        case ( ($days == 3) || ($days == 4) ):
            $hd = "$days дня назад, " . date('H:i', $date);
            break;
        case ( ($days > 4) && ($days < 21) ):
            $hd = "$days дней назад, " . date('H:i', $date);
            break;
        default:
            $hd = date('d.m.Y H:i', $date);
    }
    return $hd;
}