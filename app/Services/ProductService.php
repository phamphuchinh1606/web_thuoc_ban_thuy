<?php

namespace App\Services;

use App\Common\AppCommon;
use App\Common\Constant;
use App\Common\ImageCommon;
use App\Models\Product;
use Illuminate\Http\Request;
use Storage;

class ProductService extends BaseService{

    public function getAllLProduct($searchInfo = null, $sortBy = null){
        if(isset($searchInfo)){
            $searchInfo->product_type_service = 0;
            $listProduct = $this->productLogic->getAllProductBySearchInfo($searchInfo,$sortBy);
        }else{
            $searchInfo = new \Stdclass();
            $searchInfo->product_type_service = 0;
            $listProduct = $this->productLogic->getAllLProduct($searchInfo);
        }
        foreach ($listProduct as $product){
            $product->public_name = AppCommon::namePublicProductType($product->is_public);
            $product->public_class = AppCommon::classPublicProductType($product->is_public);
        }
        return $listProduct;
    }

    public function getAllProductService($searchInfo = null, $sortBy = null){
        if(!isset($searchInfo)){
            $searchInfo = new \Stdclass();
            $searchInfo->product_type_service = 1;
        }
        if(isset($searchInfo)){
            $listProduct = $this->productLogic->getAllProductBySearchInfo($searchInfo,$sortBy);
        }else{
            $listProduct = $this->productLogic->getAllLProduct($searchInfo);
        }
        foreach ($listProduct as $product){
            $product->public_name = AppCommon::namePublicProductType($product->is_public);
            $product->public_class = AppCommon::classPublicProductType($product->is_public);
        }
        return $listProduct;
    }

    public function getAllEquipment($searchInfo = null, $sortBy = null){
        if(!isset($searchInfo)){
            $searchInfo = new \Stdclass();
            $searchInfo->equipment_type_id = 0;
        }
        if(isset($searchInfo)){
            $listProduct = $this->productLogic->getAllProductBySearchInfo($searchInfo,$sortBy);
        }else{
            $listProduct = $this->productLogic->getAllLProduct($searchInfo);
        }
        foreach ($listProduct as $product){
            $product->public_name = AppCommon::namePublicProductType($product->is_public);
            $product->public_class = AppCommon::classPublicProductType($product->is_public);
        }
        return $listProduct;
    }

    public function getAllDesign($searchInfo = null, $sortBy = null){
        if(!isset($searchInfo)){
            $searchInfo = new \Stdclass();
            $searchInfo->design_type_id = 0;
        }
        if(isset($searchInfo)){
            $listProduct = $this->productLogic->getAllProductBySearchInfo($searchInfo,$sortBy);
        }else{
            $listProduct = $this->productLogic->getAllLProduct($searchInfo);
        }
        foreach ($listProduct as $product){
            $product->public_name = AppCommon::namePublicProductType($product->is_public);
            $product->public_class = AppCommon::classPublicProductType($product->is_public);
        }
        return $listProduct;
    }

    public function searchProductByName($productName){
        $listProduct = $this->productLogic->searchProductByName($productName);
        foreach ($listProduct as $product){
            $product->public_name = AppCommon::namePublicProductType($product->is_public);
            $product->public_class = AppCommon::classPublicProductType($product->is_public);
        }
        return $listProduct;
    }

    public function getProductNews($limit = 8){
        $listProduct = $this->productLogic->getProductNews($limit);
        return $listProduct;
    }

    public function createProduct(Request $request){
        $params = [];
        $params['productName'] = $request->product_name;
        $params['productCode'] = $request->product_code;
        $params['vendorId'] = $request->vendor;
        $params['productTypeId'] = $request->product_type;
        $params['productPrice'] = $request->product_price == null ? 0 : $request->product_price;
        $params['productCostPrice'] = $request->product_cost_price == null ? 0 : $request->product_cost_price;
        $params['productComparePrice'] = $request->product_compare_price == null ? 0 : $request->product_compare_price;
        $params['productSalePercent'] = $request->product_sale_percent == null ? 0 : $request->product_sale_percent;
        $params['isPublic'] = AppCommon::getIsPublic($request->is_public);
        $params['productDescription'] = $request->product_description;
        $params['productContent'] = $request->product_content;
        $params['projectTypeService'] = $request->project_type_service;
        $params['equipmentTypeId'] = $request->equipment_type_id;
        $params['designTypeId'] = $request->design_type_id;
        $product = $this->productLogic->createProduct($params);
        if($product != null){
            $productId = $product->id;
            $productImage = $request->file('product_main_image') ;
            if(isset($productImage)){
                $imageName = ImageCommon::moveImageProduct($productImage, $productId);
                $product = $this->productLogic->updateImage($product,$imageName);
            }
            $productImages = $request->product_images;
            if(isset($productImages) && count($productImages) > 0){
               foreach ($productImages as $image){
                   if(isset($image)){
                       $moveImageName = str_replace(Constant::$PATH_FOLDER_UPLOAD_IMAGE_DROP,Constant::$PATH_FOLDER_UPLOAD_PRODUCT.'/'.$productId, $image);
                       Storage::move($image, $moveImageName);
                       $this->productImageLogic->create($productId,$moveImageName);
                   }
               }
            }
        }
        return $product;
    }

    public function updateProduct($productId, Request $request){
        $params = [];
        $params['productName'] = $request->product_name;
        $params['productCode'] = $request->product_code;
        $params['vendorId'] = $request->vendor;
        $params['productTypeId'] = $request->product_type;
        $params['productPrice'] = $request->product_price == null ? 0 : $request->product_price;
        $params['productCostPrice'] = $request->product_cost_price == null ? 0 : $request->product_cost_price;
        $params['productComparePrice'] = $request->product_compare_price == null ? 0 : $request->product_compare_price;
        $params['productSalePercent'] = $request->product_sale_percent == null ? 0 : $request->product_sale_percent;
        $params['isPublic'] = AppCommon::getIsPublic($request->is_public);
        $params['productDescription'] = $request->product_description;
        $params['productContent'] = $request->product_content;
        $productImage = $request->file('product_main_image') ;
        if(isset($productImage)){
            $productDb = $this->productLogic->getProduct($productId);
            if(isset($productDb)){
                ImageCommon::deleteImage($productDb->product_image);
            }
            $imageName = ImageCommon::moveImageProduct($productImage, $productId);
            $params['productImage'] = $imageName;
        }
        $product = $this->productLogic->updateProduct($productId, $params);
        return $product;
    }

    public function getProductById($productId){
        return $this->productLogic->getProduct($productId);
    }

    public function getInfoProduct($productId){
        $product = $this->productLogic->getProductInfo($productId);
        if(isset($product->id)){
            $product->images = $this->productImageLogic->getListImageByProductId($productId);
        }
        return $product;
    }

    public function getListProductSameType($productId,$productTypeId){
        return $this->productLogic->getListProductSameType($productId,$productTypeId);
    }

    public function getListProductHot($limit = 5){
        return $this->productLogic->getListProductHot($limit);
    }

    public function getListProductService($limit = 5){
        return $this->productLogic->getListProductServiceNew($limit);
    }

    public function delete($productId){
        $this->productLogic->delete($productId);
    }

    public function addImage($productId,$image){
        $imageName = ImageCommon::moveImageProduct($image, $productId);
        $this->productImageLogic->create($productId,$imageName);
    }

    public function deleteImage($imageId){
        $this->productImageLogic->delete($imageId);
    }

    //Service Guest
    public function getListProductByProductType($productTypeId, $sortBy, $searchInfo){
        if($productTypeId == null){
            $products = $this->getAllLProduct($searchInfo,$sortBy);
        }else{
            $products = $this->productLogic->getListProductByProductType($productTypeId,$sortBy);
        }
        return $products;
    }

    public function getListProjectBySearch($sortBy, $searchInfo){
        $products = $this->getAllProductService($searchInfo,$sortBy);
        return $products;
    }

    public function createListProductApi($listProductInfo){
        foreach ($listProductInfo as $product){

            $params['productName'] = $product->product_name;
            $params['productTitle'] = $product->product_name;
            $params['productCode'] = $product->product_code;
            $params['productImage'] = $product->product_image;
            $params['isPublic'] = Constant::$PUBLIC_FLG_ON;
            $productInsert = $this->productLogic->createProduct($params);
            if($product != null){
                $productId = $productInsert->id;
                //Save image main
                $productInsert->product_image = $this->saveImage($product->product_image,$productId);
                $this->productLogic->save($productInsert);
            }
        }
    }

    private function saveImage($urlImage, $productId){
        $urlImageTemp = $urlImage;
        $names = explode('/',$urlImage);
        $name = end($names);
        if(str_contains($name,'?')){
            $name = substr($name,0 ,strrpos($name, '?'));
        }
        if(str_contains($urlImage,' ')){
            $urlImageTemp = str_replace(' ','%20',$urlImageTemp);
        }
        $urlImageTemp = str_replace($name,urlencode($name),$urlImageTemp);
        $contents = file_get_contents($urlImageTemp);
        if(isset($contents)){
            $name = substr($urlImage, strrpos($urlImage, '/') + 1);
            if(str_contains($name,'?')){
                $name = substr($name,0 ,strrpos($name, '?'));
            }
            $pathImage = Constant::$PATH_FOLDER_UPLOAD_PRODUCT."/$productId/$name";
            Storage::put($pathImage, $contents);
            return $pathImage;
        }
        return $urlImage;
    }
}
