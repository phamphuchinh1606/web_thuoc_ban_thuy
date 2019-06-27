<?php

namespace App\Services;

use App\Common\AppCommon;
use App\Common\Constant;
use App\Common\ImageCommon;
use Illuminate\Http\Request;
use DB;

class ManufactureService extends BaseService{

    public function getManufactureAll(){
        return $this->manufactureLogic->getManufactureAll();
    }

    public function createManufacture(Request $request){
        $fileImage = $request->file('src_image');
        if(isset($fileImage)){
            $srcImage = ImageCommon::moveImage($fileImage, Constant::$PATH_FOLDER_UPLOAD_IMAGE_MANUFACTURE);
            $linkUrl = $request->link_url;
            $sortNum = $request->sort_num;
            return $this->manufactureLogic->createManufacture($srcImage,$linkUrl,$sortNum);
        }
        return null;
    }

    public function deleteManufacture($manufactureId){
        $this->manufactureLogic->deleteManufacture($manufactureId);
    }
}
