<?php

namespace App\Common;

class AppCommon{

    public static function assetPublic($filePath){
        return asset($filePath);
    }

}