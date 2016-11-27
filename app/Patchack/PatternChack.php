<?php
namespace App\Patchack;

class PatternChack{

    static public $pattern = [
        "email"=>'/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/',
        "phone"=>'/^1[34578]\d{9}$/',
        "num6"=>'/^[0-9]{6}$/',
        "num4"=>'/^[0-9]{4}$/',
        "str4"=>'/^[a-zA-Z]{4}$/',
        "str6"=>'/^[a-zA-Z]{6}$/',
        "w6"=>'/^\w{6}$/',
        "w4"=>'/^\w{4}$/',
        "w4+"=>'/^\w{4,}$/',
        "w6+"=>'/^\w{6,}$/',
        "card"=>'/^\d{6}(18|19|20)?\d{2}(0[1-9]|1[12])(0[1-9]|[12]\d|3[01])\d{3}(\d|X)$/',
        "date"=>'/^((?:19|20)\d\d)-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])$/',
        "ch"=>'/^[\x{4e00}-\x{9fa5}]+$/u',
        "pwd6-16"=>'/^.{6,16}$/',
    ];

    /**
     * 使用正则检测一个字符串
     * $str 待检验字符串
     * $patt 引用正则的名称
     */
    public static function check($str,$patt){
        if(array_key_exists($patt,self::$pattern)){
            return preg_match(self::$pattern[$patt],$str);
        }else{
            return false;
        }
    }

    public static function trim($str){
        return mb_strlen(trim($str));
    }
}