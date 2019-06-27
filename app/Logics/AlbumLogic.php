<?php

namespace App\Logics;

use App\Common\Constant;
use App\Models\Album;

class AlbumLogic extends BaseLogic{
    public function getAll($params = ['limit' => 20]){
        $query = Album::where('is_delete',Constant::$DELETE_FLG_OFF);
        $limit = 20;
        if(isset($params['limit'])){
            $limit = $params['limit'];
        }
        $albums = $query->orderBy('sort_num')->paginate($limit);
        return $albums;
    }

    public function create($params = []){
        $album = new Album();
        if(isset($params['imageSrc'])){
            $album->image_src = $params['imageSrc'];
        }
        $album->sort_num = $params['sortNum'];
        $album->save();
        return $album;
    }

    public function update($albumId, $params = []){
        $album = Album::find($albumId);
        if(isset($album)){
            $album->sort_num = $params['sortNum'];
            if(isset($params['imageSrc'])){
                $album->image_src = $params['imageSrc'];
            }
            $album->save();
        }
    }

    public function findId($albumId){
        return Album::find($albumId);
    }

    public function delete($albumId){
        $album = Album::find($albumId);;
        if(isset($album)){
            $album->is_delete = Constant::$DELETE_FLG_ON;
            $album->save();
        }
    }
}
