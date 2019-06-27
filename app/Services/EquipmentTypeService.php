<?php

namespace App\Services;

use App\Common\AppCommon;
use App\Common\Constant;
use App\Common\ImageCommon;
use Illuminate\Http\Request;

class EquipmentTypeService extends BaseService{

    public function create(Request $request){
        $productTypeName = $request->equipment_type_name;
        $isPublic = AppCommon::getIsPublic($request->is_public);
        $imageIcon = $request->image_icon;
        $imageName = null;
        if(isset($imageIcon)){
            $imageName = ImageCommon::moveImage($imageIcon,Constant::$PATH_FOLDER_UPLOAD_PRODUCT_TYPE);
        }
        return $this->equipmentTypeLogic->create($productTypeName, $isPublic, $imageName);
    }

    public function createChildren($productTypeId,$productTypeName, $isPublic){
        return $this->equipmentTypeLogic->createChildren($productTypeId,$productTypeName, $isPublic);
    }

    public function update($productTypeId,Request $request){
        $productTypeName = $request->equipment_type_name;
        $isPublic = AppCommon::getIsPublic($request->is_public);
        $imageIcon = $request->image_icon;
        $imageName = null;
        if(isset($imageIcon)){
            $producType = $this->equipmentTypeLogic->findId($productTypeId);
            if(isset($producType)){
                ImageCommon::deleteImage($producType->image_icon);
            }
            $imageName = ImageCommon::moveImage($imageIcon,Constant::$PATH_FOLDER_UPLOAD_PRODUCT_TYPE);
        }
        $this->equipmentTypeLogic->update($productTypeId,$productTypeName, $isPublic, $imageName);
    }

    public function findId($productTypeId){
        return $this->equipmentTypeLogic->findId($productTypeId);
    }

    public function getAll(){
        $listProductType = $this->equipmentTypeLogic->getAll();
        foreach ($listProductType as $productType){
            $productType->public_name = AppCommon::namePublicProductType($productType->is_public);
            $productType->public_class = AppCommon::classPublicProductType($productType->is_public);
        }
        return $listProductType;
    }

    public function getAllNotParent(){
        $listProductType = $this->equipmentTypeLogic->getAllNotParent();
        foreach ($listProductType as $productType){
            $productType->public_name = AppCommon::namePublicProductType($productType->is_public);
            $productType->public_class = AppCommon::classPublicProductType($productType->is_public);
        }
        return $listProductType;
    }

    public function getAllByTree(){
        $listProductType = $this->equipmentTypeLogic->getAll();
        $listTree = [];
        $mapTree = [];
        foreach ($listProductType as $productType){
            if($productType->parent_id == null ){
                array_push($listTree,$productType);
                $mapTree[$productType->id] = $productType;
            }else {
                $parentId = $productType->parent_id;
                $productTypeParent = $mapTree[$parentId];
                if(isset($productTypeParent)){
                    if(isset($productTypeParent['childs'])){
                        $array = $productTypeParent->childs;
                        array_push($array,$productType);
                        $productTypeParent->childs = $array;
                    }else{
                        $productTypeParent->childs = [$productType];
                    }
                }
            }
        }
        return $listTree;
    }

    public function getByParentId($productTypeId){
        $listProductType = $this->equipmentTypeLogic->getByParentId($productTypeId);
        foreach ($listProductType as $productType){
            $productType->public_name = AppCommon::namePublicProductType($productType->is_public);
            $productType->public_class = AppCommon::classPublicProductType($productType->is_public);
        }
        return $listProductType;
    }

    public function delete($productTypeId){
        return $this->equipmentTypeLogic->delete($productTypeId);
    }
}
