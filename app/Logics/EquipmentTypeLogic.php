<?php

namespace App\Logics;

use App\Common\Constant;
use App\Models\EquipmentType;
use Slug;

class EquipmentTypeLogic extends BaseLogic{
    public function getAll(){
        return EquipmentType::where('is_delete',Constant::$DELETE_FLG_OFF)
                            ->orderBy('id','asc')->get();
    }

    public function getAllNotParent(){
        return EquipmentType::where('is_delete',Constant::$DELETE_FLG_OFF)
                ->whereNull('parent_id')->get();
    }

    public function getByParentId($productTypeId){
        return EquipmentType::where('is_delete',Constant::$DELETE_FLG_OFF)
            ->where('parent_id',$productTypeId)->get();
    }

    public function create($productTypeName, $isPublic, $imageIcon = null){
        $productType = new EquipmentType();
        $productType->equipment_type_name = $productTypeName;
        $productType->is_public = $isPublic;
        if($imageIcon != null){
            $productType->image_icon = $imageIcon;
        }
        if(isset($productTypeName)){
            $productType->slug = Slug::createSlug(EquipmentType::class,'slug',$productTypeName);
        }
        return $productType->save();
    }

    public function createChildren($productTypeId,$productTypeName, $isPublic){
        $productType = new EquipmentType();
        $productType->equipment_type_name = $productTypeName;
        $productType->is_public = $isPublic;
        $productType->parent_id = $productTypeId;
        if(isset($productTypeName)){
            $productType->slug = Slug::createSlug(EquipmentType::class,'slug',$productTypeName);
        }
        return $productType->save();
    }

    public function update($productTypeId, $productTypeName, $isPublic, $imageIcon = null){
        $productType = EquipmentType::find($productTypeId);;
        if(isset($productType)){
            $productType->equipment_type_name = $productTypeName;
            $productType->is_public = $isPublic;
            if($imageIcon != null){
                $productType->image_icon = $imageIcon;
            }
            if(isset($productTypeName)){
                $productType->slug = Slug::createSlug(EquipmentType::class,'slug',$productTypeName);
            }
            $productType->save();
        }
    }

    public function findId($productTypeId){
        return EquipmentType::find($productTypeId);
    }

    public function delete($productTypeId){
        $productType = EquipmentType::find($productTypeId);;
        if(isset($productType)){
            $productType->is_delete = Constant::$DELETE_FLG_ON;
            $productType->save();
        }
    }
}
