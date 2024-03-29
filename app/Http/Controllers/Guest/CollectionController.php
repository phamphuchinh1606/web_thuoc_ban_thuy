<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index($slug = null, Request $request){

        $productType = new \stdClass();
        $productType->id = '';
        $productType->product_type_name = "Tất cả sản phẩm";
        if($slug != null){
            $productType = $this->productTypeService->findSlug($slug);
        }
        $sortBy = null;
        if(isset($request->sort_by)) $sortBy = $request->sort_by;
        $searchInfo = $this->getSearchInfo($request, $productType);
        $products = $this->productService->getListProductByProductType($productType->id,$sortBy,$searchInfo);
        return view('guest.collection.collection',[
            'products' => $products,
            'productType' => $productType,
            'sortBy' => $sortBy,
            'searchInfo' => $searchInfo
        ]);
    }

    public function indexEquipment($slug = null, Request $request){
        $productType = new \Stdclass();
        $productType->id = '';
        $productType->product_type_name = "Tất cả thiết bị";
        if($slug != null){
            $productType = $this->equipmentTypeService->findSlug($slug);
            $productType->product_type_name = $productType->equipment_type_name;
        }
        $sortBy = null;
        if(isset($request->sort_by)) $sortBy = $request->sort_by;
        $searchInfo = $this->getSearchInfo($request, $productType);
        $searchInfo->equipment_type_id = 0;
        $products = $this->productService->getListProductByEquipmentType($productType->id,$sortBy,$searchInfo);
        return view('guest.collection.collection',[
            'products' => $products,
            'productType' => $productType,
            'sortBy' => $sortBy,
            'searchInfo' => $searchInfo
        ]);
    }

    public function indexDesign($slug = null, Request $request){
        $productType = new \Stdclass();
        $productType->id = '';
        $productType->product_type_name = "Tất cả thiết trí";
        if($slug != null){
            $productType = $this->designTypeService->findSlug($slug);
            $productType->product_type_name = $productType->design_type_name;
        }
        $sortBy = null;
        if(isset($request->sort_by)) $sortBy = $request->sort_by;
        $searchInfo = $this->getSearchInfo($request, $productType);
        $searchInfo->design_type_id = 0;
        $products = $this->productService->getListProductByDesignType($productType->id,$sortBy,$searchInfo);
        return view('guest.collection.collection',[
            'products' => $products,
            'productType' => $productType,
            'sortBy' => $sortBy,
            'searchInfo' => $searchInfo
        ]);
    }

    private function getSearchInfo(Request $request, $productType){
        $searchInfo = new \StdClass();
        if(isset($request->product_type)){
            $searchInfo->product_type = $request->product_type;
        }else if(isset($productType->id)){
            $searchInfo->product_type = $productType->id;
            if(isset($productType->parent_id)){
                $searchInfo->product_type = $productType->parent_id;
            }
        }
        $searchInfo->product_price = "";
        if(isset($request->product_price)){
            $searchInfo->product_price = $request->product_price;
        }
        $searchInfo->view = "";
        if(isset($request->view)){
            $searchInfo->view = $request->view;
        }
        return $searchInfo;
    }

    public function search(Request $request){
        $products = [];
        if(isset($request->q)){
            $products = $this->productService->searchProductByName($request->q);
        }
        return view('guest.search.search_product',[
            'products' => $products,
            'product_name' => $request->q
        ]);
    }

    public function searchAjax(Request $request){
        if(isset($request->q)){
            $products = $this->productService->searchProductByName($request->q);
        }else{
            $products = $this->productService->getAllLProduct();
        }
        return view('guest.search.search_ajax',[
            'products' => $products,
            'product_name' => $request->q
        ]);
    }
}
