<?php

namespace App\Services;
use App\Common\AppCommon;
use App\Common\Constant;
use App\Common\ImageCommon;
use Illuminate\Http\Request;

class AlbumService extends BaseService{

    public function getAll($params = []){
        return $this->albumLogic->getAll($params);
    }

    public function create(Request $request){
        $params['sortNum'] = $request->sort_num;
        $album = $this->albumLogic->create($params);
        if(isset($album)){
            $imageSrc = $request->src_image;
            if(isset($imageSrc)){
                $imageSrc = ImageCommon::moveImage($imageSrc,Constant::$PATH_FOLDER_UPLOAD_IMAGE_ALBUM.'/'.$album->id);
                $album->image_src = $imageSrc;
                $album->save();
            }
        }
        return $album;
    }

    public function update($albumId, Request $request){
        $params['sortNum'] = $request->sort_num;
        $imageSrc = $request->src_image;
        if(isset($imageSrc)){
            $albumDB = $this->albumLogic->findId($albumId);
            if(isset($albumDB)){
                ImageCommon::deleteImage($albumDB->image_src);
            }
            $imageName = ImageCommon::moveImage($imageSrc,Constant::$PATH_FOLDER_UPLOAD_IMAGE_ALBUM.'/'.$albumDB->id);
            $params['imageSrc'] = $imageName;
        }
        $this->albumLogic->update($albumId, $params);
    }

    public function findId($albumId){
        return $this->albumLogic->findId($albumId);
    }

    public function delete($albumId){
        $this->albumLogic->delete($albumId);
    }
}
