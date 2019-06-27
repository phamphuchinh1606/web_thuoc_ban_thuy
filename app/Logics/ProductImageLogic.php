<?php

namespace App\Logics;

use App\Models\ProductImage;

class ProductImageLogic extends BaseLogic{

    public function getListImageByProductId($productId){
        return ProductImage::where('product_id',$productId)->get();
    }

    public function create($productId, $srcImage){
        $productImage = new ProductImage();
        $productImage->product_id = $productId;
        $productImage->image_src = $srcImage;
        $productImage->save();
        return $productImage;
    }

    public function delete($imageId){
        ProductImage::destroy($imageId);
    }
}
