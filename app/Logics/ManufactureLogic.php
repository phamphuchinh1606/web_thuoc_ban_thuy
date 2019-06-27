<?php

namespace App\Logics;

use App\Models\Manufacture;

class ManufactureLogic extends BaseLogic{
    public function getManufactureAll(){
        return Manufacture::all();
    }

    public function createManufacture($srcImage, $linkUrl, $sortNum){
        $manufacture = new Manufacture();
        $manufacture->src_image = $srcImage;
        $manufacture->link_url = $linkUrl;
        if(isset($sortNum)){
            $manufacture->sort_num = $sortNum;
        }
        $manufacture->save();
        return $manufacture;
    }

    public function deleteManufacture($manufactureId){
        Manufacture::destroy($manufactureId);
    }
}
