<?php

namespace App\Http\Controllers\Guest;

use App\Common\AppCommon;
use App\Common\Constant;
use App\Common\ImageCommon;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use StdClass;

class ProjectController extends Controller
{
    public function index($slug = null, $id = 1){
        $product = $this->productService->getInfoProduct($id);
        $productHots = $this->productService->getListProductHot(4);
        $productSameTypes = new StdClass();
        if(isset($product)){
            $productSameTypes = $this->productService->getListProductSameType($product->id,$product->product_type_id);
        }
        return view('guest.project.project_detail',[
            'product' => $product,
            'productSameTypes' => $productSameTypes,
            'productHots' => $productHots
        ]);
    }

    public function showAll(Request $request){

        $productType = new \stdClass();
        $productType->product_type_name = "Tất cả dự án";
        $sortBy = null;
        if(isset($request->sort_by)) $sortBy = $request->sort_by;
        $searchInfo = $this->getSearchInfo($request, $productType);
        $searchInfo->product_type_service = 1;
        $products = $this->productService->getListProjectBySearch($sortBy,$searchInfo);
        return view('guest.project.projects',[
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
        if(isset($request->product_name)){
            $products = $this->productService->searchProductByName($request->product_name);
        }
        return view('guest.collection.search',[
            'products' => $products,
            'product_name' => $request->product_name
        ]);
    }
}
