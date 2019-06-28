<?php

namespace App\Logics;

use App\Common\Constant;
use App\Models\Product;
use DB;
use App\Models\TableNameDB;
use Slug;

class ProductLogic extends BaseLogic{

    public function getAllLProduct($searchInfo = null){
        $query = Db::table(TableNameDB::$TableProduct.' as product')
            ->leftjoin(TableNameDB::$TableProductType.' as type', 'product.product_type_id','=','type.id')
            ->leftjoin(TableNameDB::$TableEquipmentType.' as equipment_type', 'product.equipment_type_id','=','equipment_type.id')
            ->leftjoin(TableNameDB::$TableDesignType.' as design_type', 'product.design_type_id','=','design_type.id')
            ->where('product.is_delete', Constant::$DELETE_FLG_OFF);
        if(isset($searchInfo) && isset($searchInfo->product_type_service)){
            if($searchInfo->product_type_service === 0){
                $query->whereNotNull('product.product_type_id');
            }else{
                $query->where('product.project_type_service',$searchInfo->product_type_service);
            }
        }
        if(isset($searchInfo) && isset($searchInfo->equipment_type_id)){
            if($searchInfo->equipment_type_id === 0){
                $query->whereNotNull('product.equipment_type_id');
            }else{
                $query->where('product.equipment_type_id',$searchInfo->equipment_type_id);
            }
        }
        if(isset($searchInfo) && isset($searchInfo->design_type_id)){
            if($searchInfo->design_type_id === 0){
                $query->whereNotNull('product.design_type_id');
            }else{
                $query->where('product.design_type_id',$searchInfo->design_type_id);
            }
        }
        if(isset($searchInfo->product_name)){
            $query->where('product_name','like',"%$searchInfo->product_name%");
        }
        $listProducts = $query->select('product.*', 'type.product_type_name', 'equipment_type.equipment_type_name', 'design_type.design_type_name')
                        ->paginate(20);
        return $listProducts;
    }

    public function getAllProductBySearchInfo($searchInfo = null, $sortBy = null){
        $query = Db::table(TableNameDB::$TableProduct.' as product')
            ->leftjoin(TableNameDB::$TableProductType.' as type', 'product.product_type_id','=','type.id')
            ->leftjoin(TableNameDB::$TableEquipmentType.' as equipment_type', 'product.equipment_type_id','=','equipment_type.id')
            ->leftjoin(TableNameDB::$TableDesignType.' as design_type', 'product.design_type_id','=','design_type.id')
            ->where('product.is_delete', Constant::$DELETE_FLG_OFF);
        $delimiter = '-';
        if(isset($searchInfo) && isset($searchInfo->product_type_service)){
            if($searchInfo->product_type_service === 0){
                $query->whereNotNull('product.product_type_id');
            }else{
                $query->where('product.project_type_service',$searchInfo->product_type_service);
            }
        }
        if(isset($searchInfo) && isset($searchInfo->equipment_type_id)){
            if($searchInfo->equipment_type_id === 0){
                $query->whereNotNull('product.equipment_type_id');
            }else{
                $query->where('product.equipment_type_id',$searchInfo->equipment_type_id);
            }
        }
        if(isset($searchInfo) && isset($searchInfo->design_type_id)){
            if($searchInfo->design_type_id === 0){
                $query->whereNotNull('product.design_type_id');
            }else{
                $query->where('product.design_type_id',$searchInfo->design_type_id);
            }
        }
        if(isset($searchInfo)){
            if(isset($searchInfo->product_name)){
                $query->where('product_name','like',"%$searchInfo->product_name%");
            }
            if(isset($searchInfo->product_type)){
                $productTypes = explode($delimiter,$searchInfo->product_type);
                $query->where(function($query) use ($productTypes) {
                    foreach ($productTypes as $productTypeId){
                        if($productTypeId != ''){
                            $query->orWhere('type.id',$productTypeId)
                                ->orWhere('type.parent_id',$productTypeId);
                        }
                    }
                });
            }
            if(isset($searchInfo->product_price) && $searchInfo->product_price != ''){
                $productPrices = explode($delimiter,$searchInfo->product_price);
                $query->where(function($query) use ($productPrices) {
                    foreach ($productPrices as $productPrice){
                        switch ($productPrice){
                            case 'less_100000':
                                $query->orWhere('product.product_price','<',100000);
                                break;
                            case '100000_300000':
                                $query->orWhereBetween('product.product_price',array(100000, 300000));
                                break;
                            case '300000_500000':
                                $query->orWhereBetween('product.product_price',array(300000, 500000));
                                break;
                            case '500000_1000000':
                                $query->orWhereBetween('product.product_price',array(500000, 1000000));
                                break;
                            case 'bigger_1000000':
                                $query->orWhere('product.product_price','>',1000000);
                                break;
                        }
                    }
                });

            }
        }
        if($sortBy != null){
            switch ($sortBy){
                case Constant::$SORT_BY_PRODUCT_CREATED_ASCENDING:
                    $query->orderBy('created_at','asc');
                    break;
                case Constant::$SORT_BY_PRODUCT_CREATED_DESCENDING:
                    $query->orderBy('created_at','desc');
                    break;
                case Constant::$SORT_BY_PRODUCT_PRICE_ASCENDING:
                    $query->orderBy('product_price','asc');
                    break;
                case Constant::$SORT_BY_PRODUCT_PRICE_DESCENDING:
                    $query->orderBy('product_price','desc');
                    break;
                case Constant::$SORT_BY_PRODUCT_TITLE_ASCENDING:
                    $query->orderBy('product_name','asc');
                    break;
                case Constant::$SORT_BY_PRODUCT_TITLE_DESCENDING:
                    $query->orderBy('product_name','desc');
                    break;
                case Constant::$SORT_BY_PRODUCT_BEST_SELLING:
                    $query->orderBy('qty_sale_order','desc');
                    break;
                default:
                    $query->orderBy('created_at','desc');
                    break;
            }
        }else{
            $query->orderBy('created_at','desc');
        }
        $listProducts = $query->select('product.*', 'type.product_type_name', 'equipment_type.equipment_type_name', 'design_type.design_type_name')
            ->paginate(20);
        return $listProducts;
    }

    public function searchProductByName($productName){
        $listProducts = Db::table(TableNameDB::$TableProduct.' as product')
            ->join(TableNameDB::$TableProductType.' as type', 'product.product_type_id','=','type.id')
            ->where('product.is_delete', Constant::$DELETE_FLG_OFF)
            ->whereRaw('LOWER(product.product_name) like \'%'.strtolower($productName).'%\'')
            ->select('product.*', 'type.product_type_name')
            ->paginate(20);
        return $listProducts;
    }

    public function getProductNews($limit = 8){
        $listProducts = Db::table(TableNameDB::$TableProduct.' as product')
            ->join(TableNameDB::$TableProductType.' as type', 'product.product_type_id','=','type.id')
            ->where('product.is_delete', Constant::$DELETE_FLG_OFF)
            ->where('product.is_public',Constant::$PUBLIC_FLG_ON)
            ->orderBy('created_at', 'desc')
            ->select('product.*', 'type.product_type_name')
            ->limit($limit)->get();
        return $listProducts;
    }

    public function getProduct($productId){
        return Product::find($productId);
    }

    public function getProductInfo($productId){
        $product = Db::table(TableNameDB::$TableProduct.' as product')
            ->leftjoin(TableNameDB::$TableProductType.' as type', 'product.product_type_id','=','type.id')
            ->leftjoin(TableNameDB::$TableVendor.' as vendor', 'product.vendor_id' ,'=' ,'vendor.id')
            ->where('product.id', $productId)
            ->select('product.*', 'type.product_type_name', 'vendor.vendor_name')
            ->first();
        return $product;
    }

    public function getProductInfoBySlug($slug){
        $product = Db::table(TableNameDB::$TableProduct.' as product')
            ->leftjoin(TableNameDB::$TableProductType.' as type', 'product.product_type_id','=','type.id')
            ->leftjoin(TableNameDB::$TableVendor.' as vendor', 'product.vendor_id' ,'=' ,'vendor.id')
            ->leftjoin(TableNameDB::$TableEquipmentType.' as equipment_type', 'product.equipment_type_id','=','equipment_type.id')
            ->leftjoin(TableNameDB::$TableDesignType.' as design_type', 'product.design_type_id','=','design_type.id')
            ->where('product.slug', $slug)
            ->select('product.*', 'type.product_type_name', 'vendor.vendor_name', 'equipment_type.equipment_type_name', 'design_type.design_type_name')
            ->first();
        return $product;
    }

    public function getListProductSameType($productId,$product, $limit = 8){
        $query = Product::where('id','<>',$productId);
        $query->where('is_delete',Constant::$DELETE_FLG_OFF);
        if(isset($product->product_type_id)){
            $query->whereNotNull('product_type_id');
            $query->orderByRaw("case when product_type_id = $product->product_type_id then 1 else 0 end desc");
        }
        if(isset($product->equipment_type_id)){
            $query->whereNotNull('equipment_type_id');
            $query->orderByRaw("case when equipment_type_id = $product->equipment_type_id    then 1 else 0 end desc");
        }
        if(isset($product->design_type_id)){
            $query->whereNotNull('design_type_id');
            $query->orderByRaw("case when design_type_id = $product->design_type_id then 1 else 0 end desc");
        }
        return $query->limit($limit)->get();

    }

    public function getListProductHot($limit = 5){
        $products = Product::where('products.is_delete', Constant::$DELETE_FLG_OFF)
            ->where('products.is_public',Constant::$PUBLIC_FLG_ON)
            ->orderBy('view_num','desc')
            ->limit($limit)->get();
        return $products;
    }

    public function getListProductServiceNew($limit = 5){
        $products = Product::where('products.is_delete', Constant::$DELETE_FLG_OFF)
            ->where('products.is_public',Constant::$PUBLIC_FLG_ON)
            ->where('project_type_service',Constant::$PUBLIC_PRODUCT_SERVICE)
            ->orderBy('created_at', 'desc')
            ->limit($limit)->get();
        return $products;
    }

    public function createProduct($params = []){
        if(count($params) > 0){
            $product = new Product();
            $product->product_name = $params['productName'];
            $product->product_code = $params['productCode'];
            if(isset($params['vendorId'])){
                $product->vendor_id = $params['vendorId'];
            }
            if(isset($params['productTypeId'])){
                $product->product_type_id = $params['productTypeId'];
            }
            if(isset($params['productPrice'])){
                $product->product_price = $params['productPrice'];
            }
            if(isset($params['productCostPrice'])){
                $product->product_cost_price = $params['productCostPrice'];
            }
            if(isset($params['productComparePrice'])){
                $product->product_compare_price = $params['productComparePrice'];
            }
            if(isset($params['productSalePercent'])){
                $product->product_sale_percent = $params['productSalePercent'];
            }

            $product->is_public = $params['isPublic'];
            $product->product_qty = 0;
            if(isset($params['productDescription'])){
                $product->product_description = $params['productDescription'];
            }
            if(isset($params['productContent'])){
                $product->product_content = $params['productContent'];
            }
            if(isset($params['productName'])){
                $product->slug = Slug::createSlug(Product::class,'slug',$params['productName']);
            }
            if(isset($params['projectTypeService'])){
                $product->project_type_service = $params['projectTypeService'];
            }
            if(isset($params['equipmentTypeId'])){
                $product->equipment_type_id = $params['equipmentTypeId'];
            }
            if(isset($params['designTypeId'])){
                $product->design_type_id = $params['designTypeId'];
            }
            $product->save();
            return $product;
        }
        return null;
    }

    public function updateProduct($productId, $params = []){
        if(count($params) > 0){
            $product = Product::find($productId);
            if(isset($product)){
                $product->product_name = $params['productName'];
                $product->product_code = $params['productCode'];
                $product->vendor_id = $params['vendorId'];
                if(isset($params['productTypeId'])){
                    $product->product_type_id = $params['productTypeId'];
                }
                if(isset($params['equipmentTypeId'])){
                    $product->equipment_type_id = $params['equipmentTypeId'];
                }
                if(isset($params['designTypeId'])){
                    $product->design_type_id = $params['designTypeId'];
                }
                $product->product_price = $params['productPrice'];
                if(isset($params['productCostPrice'])){
                    $product->product_cost_price = $params['productCostPrice'];
                }
                if(isset($params['productComparePrice'])){
                    $product->product_compare_price = $params['productComparePrice'];
                }
                $product->product_sale_percent = $params['productSalePercent'];
                $product->is_public = $params['isPublic'];
                $product->product_qty = 0;
                $product->product_description = $params['productDescription'];
                $product->product_content = $params['productContent'];
                if(isset($params['productImage'])){
                    $product->product_image = $params['productImage'];
                }
                if(isset($params['productName'])){
                    $product->slug = Slug::createSlug(Product::class,'slug',$params['productName']);
                }
                $product->save();
            }
            return $product;
        }
        return null;
    }

    public function updateImage(Product $product, $imageName){
        if(isset($product)){
            $product->product_image = $imageName;
            $product->save();
            return $product;
        }
    }

    public function save(Product $product){
        if(isset($product)){
            $product->save();
        }
    }

    public function delete($productId){
        $product = Product::find($productId);
        if(isset($product)){
            $product->is_delete = Constant::$DELETE_FLG_ON;
            $product->save();
        }
    }

    //Logic Guest
    public function getListProductByProductType($productTypeId, $sortBy, $limitPage = 20){
        $query = Db::table(TableNameDB::$TableProduct.' as product')
            ->where('is_delete',Constant::$DELETE_FLG_OFF)
            ->where('is_public', Constant::$PUBLIC_FLG_ON)
            ->whereIn('product_type_id',function($query) use ($productTypeId){
                $query->select('id')
                    ->from(TableNameDB::$TableProductType)
                    ->where('id',$productTypeId)
                    ->orWhere('parent_id',$productTypeId);
            });
        if($sortBy != null){
            switch ($sortBy){
                case Constant::$SORT_BY_PRODUCT_CREATED_ASCENDING:
                    $query->orderBy('created_at','asc');
                    break;
                case Constant::$SORT_BY_PRODUCT_CREATED_DESCENDING:
                    $query->orderBy('created_at','desc');
                    break;
                case Constant::$SORT_BY_PRODUCT_PRICE_ASCENDING:
                    $query->orderBy('product_price','asc');
                    break;
                case Constant::$SORT_BY_PRODUCT_PRICE_DESCENDING:
                    $query->orderBy('product_price','desc');
                    break;
                case Constant::$SORT_BY_PRODUCT_TITLE_ASCENDING:
                    $query->orderBy('product_name','asc');
                    break;
                case Constant::$SORT_BY_PRODUCT_TITLE_DESCENDING:
                    $query->orderBy('product_name','desc');
                    break;
                case Constant::$SORT_BY_PRODUCT_BEST_SELLING:
                    $query->orderBy('qty_sale_order','desc');
                    break;
                default:
                    $query->orderBy('created_at','desc');
                    break;
            }
        }else{
            $query->orderBy('created_at','desc');
        }
        $products = $query->paginate($limitPage);
        return $products;
    }

    public function getListProductByType($searchInfo, $sortBy, $limitPage = 20){
        $query = Db::table(TableNameDB::$TableProduct.' as product')
            ->where('is_delete',Constant::$DELETE_FLG_OFF)
            ->where('is_public', Constant::$PUBLIC_FLG_ON);
        if(isset($searchInfo->product_type_id)){
            $query->whereIn('product_type_id',function($query) use ($searchInfo){
                $query->select('id')
                    ->from(TableNameDB::$TableProductType)
                    ->where('id',$searchInfo->product_type_id)
                    ->orWhere('parent_id',$searchInfo->product_type_id);
            });
        }
        if(isset($searchInfo->equipment_type_id)){
            $query->whereIn('equipment_type_id',function($query) use ($searchInfo){
                $query->select('id')
                    ->from(TableNameDB::$TableEquipmentType)
                    ->where('id',$searchInfo->equipment_type_id)
                    ->orWhere('parent_id',$searchInfo->equipment_type_id);
            });
        }
        if(isset($searchInfo->design_type_id)){
            $query->whereIn('design_type_id',function($query) use ($searchInfo){
                $query->select('id')
                    ->from(TableNameDB::$TableDesignType)
                    ->where('id',$searchInfo->design_type_id)
                    ->orWhere('parent_id',$searchInfo->design_type_id);
            });
        }
        if($sortBy != null){
            switch ($sortBy){
                case Constant::$SORT_BY_PRODUCT_CREATED_ASCENDING:
                    $query->orderBy('created_at','asc');
                    break;
                case Constant::$SORT_BY_PRODUCT_CREATED_DESCENDING:
                    $query->orderBy('created_at','desc');
                    break;
                case Constant::$SORT_BY_PRODUCT_PRICE_ASCENDING:
                    $query->orderBy('product_price','asc');
                    break;
                case Constant::$SORT_BY_PRODUCT_PRICE_DESCENDING:
                    $query->orderBy('product_price','desc');
                    break;
                case Constant::$SORT_BY_PRODUCT_TITLE_ASCENDING:
                    $query->orderBy('product_name','asc');
                    break;
                case Constant::$SORT_BY_PRODUCT_TITLE_DESCENDING:
                    $query->orderBy('product_name','desc');
                    break;
                case Constant::$SORT_BY_PRODUCT_BEST_SELLING:
                    $query->orderBy('qty_sale_order','desc');
                    break;
                default:
                    $query->orderBy('created_at','desc');
                    break;
            }
        }else{
            $query->orderBy('created_at','desc');
        }
        $products = $query->paginate($limitPage);
        return $products;
    }
}
