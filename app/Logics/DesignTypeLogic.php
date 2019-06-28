<?php

namespace App\Logics;

use App\Common\Constant;
use App\Models\DesignType;
use Slug;

class DesignTypeLogic extends BaseLogic{
    public function getAll(){
        return DesignType::where('is_delete',Constant::$DELETE_FLG_OFF)
                            ->orderBy('id','asc')->get();
    }

    public function getAllNotParent(){
        return DesignType::where('is_delete',Constant::$DELETE_FLG_OFF)
                ->whereNull('parent_id')->get();
    }

    public function getByParentId($productTypeId){
        return DesignType::where('is_delete',Constant::$DELETE_FLG_OFF)
            ->where('parent_id',$productTypeId)->get();
    }

    public function create($productTypeName, $isPublic, $imageIcon = null){
        $productType = new DesignType();
        $productType->design_type_name = $productTypeName;
        $productType->is_public = $isPublic;
        if($imageIcon != null){
            $productType->image_icon = $imageIcon;
        }
        if(isset($productTypeName)){
            $productType->slug = Slug::createSlug(DesignType::class,'slug',$productTypeName);
        }
        return $productType->save();
    }

    public function createChildren($productTypeId,$productTypeName, $isPublic){
        $productType = new ProductType();
        $productType->design_type_name = $productTypeName;
        $productType->is_public = $isPublic;
        $productType->parent_id = $productTypeId;
        if(isset($productTypeName)){
            $productType->slug = Slug::createSlug(DesignType::class,'slug',$productTypeName);
        }
        return $productType->save();
    }

    public function update($productTypeId, $productTypeName, $isPublic, $imageIcon = null){
        $productType = DesignType::find($productTypeId);;
        if(isset($productType)){
            $productType->design_type_name = $productTypeName;
            $productType->is_public = $isPublic;
            if($imageIcon != null){
                $productType->image_icon = $imageIcon;
            }
            if(isset($productTypeName)){
                $productType->slug = Slug::createSlug(DesignType::class,'slug',$productTypeName);
            }
            $productType->save();
        }
    }

    public function findId($productTypeId){
        return DesignType::find($productTypeId);
    }

    public function findSlug($slug){
        return DesignType::where('slug',$slug)->first();
    }

    public function delete($productTypeId){
        $productType = DesignType::find($productTypeId);;
        if(isset($productType)){
            $productType->is_delete = Constant::$DELETE_FLG_ON;
            $productType->save();
        }
    }
}
