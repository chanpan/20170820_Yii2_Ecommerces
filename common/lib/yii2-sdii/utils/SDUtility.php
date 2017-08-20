<?php

namespace appxq\sdii\utils;

use yii\helpers\VarDumper;

/**
 * SDUtility class file UTF-8
 * @author SDII <iencoded@gmail.com>
 * @copyright Copyright &copy; 2015 AppXQ
 * @license http://www.appxq.com/license/
 * @version 1.0.0 Date: 7 ต.ค. 2558 10:22:22
 * @link http://www.appxq.com/
 * @example 
 */
class SDUtility {
    public static function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public static function array2String($arry) {
        $str = '';

        if (is_array($arry)) {
            $str = @serialize($arry);
        }

        return $str;
    }

    public static function strArray2String($arry) {
        $str = '';
        if ($arry !== '') {
            $value = eval("return $arry;");

            if (is_array($value)) {
                $str = @serialize($value);
            } else {
                $str = '';
            }
        }
        return $str;
    }

    public static function string2strArray($str) {
        $arry = @unserialize($str);
        if (is_array($arry)) {
            return VarDumper::export($arry);
        }
        return NULL;
    }

    public static function array2strArray($arry) {
        if (is_array($arry)) {
            return VarDumper::export($arry);
        }
        return NULL;
    }

    public static function string2Array($str) {
        $arry = @unserialize($str);
        if (is_array($arry)) {
            //$arry = self::JsExpressionRender($arry);
            return $arry;
        }
        return [];
    }

    public static function string2ArrayJs($str) {
        $arry = @unserialize($str);
        if (is_array($arry)) {
            $arry = self::JsExpressionRender($arry);
            return $arry;
        }
        return [];
    }

    public static function str2Eval($str) {
        if ($str !== '') {
            try {
                $value = eval("return $str;");
                return $value;
            } catch (\yii\base\Exception $e) {
                return FALSE;
            }
        }
        return FALSE;
    }

    public static function JsExpressionRender(&$arry) {
        foreach ($arry as $key => $value) {
            if (is_array($value)) {
                $arry[$key] = self::JsExpressionRender($value);
            }
            $str = substr($value, 0, 15);

            if (strpos($str, 'function') !== false) {

                $arry[$key] = new \yii\web\JsExpression($value);
            } else {
                $arry[$key] = $value;
            }
        }
        return $arry;
    }

    public static function getMillisecTime() {
        list($t1, $t2) = explode(' ', microtime());
        $mst = str_replace('.', '', $t2 . $t1);

        return $mst;
    }
    
    public static function getCurrentPath() {
        $current = explode('?', \yii\helpers\Url::current());
        return $current[0];
    }

}
