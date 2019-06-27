<?php

namespace App\Services;

use App\Common\AppCommon;
use App\Common\Constant;
use App\Common\ImageCommon;
use Illuminate\Http\Request;

class ProductTypeService extends BaseService{

    public function create(Request $request){
        $productTypeName = $request->product_type_name;
        $isPublic = AppCommon::getIsPublic($request->is_public);
        $imageIcon = $request->image_icon;
        $imageName = null;
        if(isset($imageIcon)){
            $imageName = ImageCommon::moveImage($imageIcon,Constant::$PATH_FOLDER_UPLOAD_PRODUCT_TYPE);
        }
        return $this->productTypeLogic->create($productTypeName, $isPublic, $imageName);
    }

    public function createChildren($productTypeId,$productTypeName, $isPublic){
        return $this->productTypeLogic->createChildren($productTypeId,$productTypeName, $isPublic);
    }

    public function update($productTypeId,Request $request){
        $productTypeName = $request->product_type_name;
        $isPublic = AppCommon::getIsPublic($request->is_public);
        $imageIcon = $request->image_icon;
        $imageName = null;
        if(isset($imageIcon)){
            $producType = $this->productTypeLogic->findId($productTypeId);
            if(isset($producType)){
                ImageCommon::deleteImage($producType->image_icon);
            }
            $imageName = ImageCommon::moveImage($imageIcon,Constant::$PATH_FOLDER_UPLOAD_PRODUCT_TYPE);
        }
        $this->productTypeLogic->update($productTypeId,$productTypeName, $isPublic, $imageName);
    }

    public function findId($productTypeId){
        return $this->productTypeLogic->findId($productTypeId);
    }

    public function getAll(){
        $listProductType = $this->productTypeLogic->getAll();
        foreach ($listProductType as $productType){
            $productType->public_name = AppCommon::namePublicProductType($productType->is_public);
            $productType->public_class = AppCommon::classPublicProductType($productType->is_public);
        }
        return $listProductType;
    }

    public function getAllNotParent(){
        $listProductType = $this->productTypeLogic->getAllNotParent();
        foreach ($listProductType as $productType){
            $productType->public_name = AppCommon::namePublicProductType($productType->is_public);
            $productType->public_class = AppCommon::classPublicProductType($productType->is_public);
        }
        return $listProductType;
    }

    public function getAllByTree(){
        $listProductType = $this->productTypeLogic->getAll();
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
        $listProductType = $this->productTypeLogic->getByParentId($productTypeId);
        foreach ($listProductType as $productType){
            $productType->public_name = AppCommon::namePublicProductType($productType->is_public);
            $productType->public_class = AppCommon::classPublicProductType($productType->is_public);
        }
        return $listProductType;
    }

    public function delete($productTypeId){
        return $this->productTypeLogic->delete($productTypeId);
    }
}
