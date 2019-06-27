<?php

namespace App\Common;

use Carbon\Carbon;

class DateUtils{

    private static function dateTimeZone(){
        return new \DateTimeZone("Asia/Ho_Chi_Minh");
    }

    public static function now(){
        return Carbon::now(self::dateTimeZone());
    }

    public static function newDate($format = "m/d/Y"){
        return self::now()->format($format);
    }

    public static function dateFormat($value, $format = "d-m-Y H:i"){
        return Carbon::parse($value,self::dateTimeZone())->format($format);
    }

    public static function startOfMonth($format = null){
        if(isset($format)){
            return self::now()->startOfMonth()->format($format);
        }
        return self::now()->startOfMonth();
    }

    public static function endOfMonth($format =null){
        if(isset($format)) return self::now()->endOfMonth()->format($format);
        return self::now()->endOfMonth();
    }
}
