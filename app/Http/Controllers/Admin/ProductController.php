<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Storage;
use App\Common\CurlCommon;

class ProductController extends Controller
{
    public function index(){
        $products = $this->productService->getAllLProduct();
        return view('admin.product.index')->with('products',$products);
    }

    public function showCreate(){
        return view('admin.product.create');
    }

    public function store(Request $request){
        $this->productService->createProduct($request);
        return redirect()->route('admin.product.index');

    }

    public function showUpdate($id){
        $product = $this->productService->getInfoProduct($id);
        return view('admin.product.update',[
            'product' => $product
        ]);
    }

    public function update($id, Request $request){
        $this->productService->updateProduct($id, $request);
        return redirect()->route('admin.product.index');
    }

    public function delete($id){
        $this->productService->delete($id);
        return redirect()->route('admin.product.index');
    }

    public function addProductImage($productId, Request $request){
        $image = $request->file('image_add');
        if(isset($image)){
            $this->productService->addImage($productId,$image);
        }
        return redirect()->route('admin.product.update',['id' => $productId]);
    }

    public function deleteProductImage($productId, $id){
        $this->productService->deleteImage($id);
        return redirect()->route('admin.product.update',['id' => $productId]);
    }

    public function loadAllProduct(){
        ini_set('max_execution_time', 600);
        $urlProductAll = "http://saonamviet.net/san-pham.html";
        $urlHostToyota = "http://saonamviet.net";
        $finder = CurlCommon::curl_get_page_to_dom_xpath($urlProductAll);
        $nodePagings = $finder->query("//ul[@class='pagination']");
        $listProductInfo = [];
        if(count($nodePagings) > 0){
            $nodePaging = $nodePagings[0];
            $listPages = $nodePaging->getElementsByTagName('li');
            $listPageNumber = [];
            foreach ($listPages as $liPage){
                $listTaga = $liPage->getElementsByTagName('a');
                if(count($listTaga) > 0){
                    $pageNumber = $listTaga[0]->nodeValue;
                    if(is_numeric($pageNumber)){
                        $listPageNumber[] = $pageNumber;
                    }
                }
            }
            foreach ($listPageNumber as $pageNumber){
                if($pageNumber != "1"){
                    $finder = CurlCommon::curl_get_page_to_dom_xpath($urlProductAll."&page=$pageNumber");
                }
                $nodeUlProducts = $finder->query("//div[@class='items-product col-md-4 col-sm-4 col-xs-6']");
                if(count($nodeUlProducts) > 0){
                    foreach ($nodeUlProducts as $nodeUlProduct){
                        $listLiProduct = $nodeUlProduct->getElementsByTagName('div');
                        $productInfo = new \StdClass();
                        foreach ($listLiProduct as $liProduct){
                            $className = $liProduct->getAttribute("class");
                            if("_img" == $className){
                                $nodeImages = $liProduct->getElementsByTagName('img');
                                if(count($nodeImages) > 0){
                                    $productInfo->product_image = $urlHostToyota.'/'.$nodeImages[0]->getAttribute('src');
                                }
                            }
                            if("_img_prd" == $className){
                                $nodeH3s = $liProduct->getElementsByTagName('h3');
                                if(count($nodeH3s) > 0){
                                    $nodeProductNames = $nodeH3s[0]->getElementsByTagName('a');
                                    if(count($nodeProductNames) > 0){
                                        $productInfo->product_name = $nodeProductNames[0]->nodeValue;
                                        $linkProduct = $urlHostToyota.'/'.$nodeProductNames[0]->getAttribute('href');
                                    }
                                }
                            }
                        }

                        if(isset($linkProduct)){
                            $productInfo = $this->getProductInfo($linkProduct,$productInfo);
                            $listProductInfo[] = $productInfo;
                        }
                    }
                }
            }
        }
        $this->productService->createListProductApi($listProductInfo);
        return redirect()->route('admin.product.index');
    }

    private function getProductInfo($urlProduct, $productInfo){
        $urlHost = "http://saonamviet.net";
        $finder = CurlCommon::curl_get_page_to_dom_xpath($urlProduct);
        $nodeCode = $finder->query("//span[@itemprop='productID']");
        if(count($nodeCode)){
            $productInfo->product_code = $nodeCode[0]->nodeValue;
        }
        $nodeLink = $finder->query("//a[@rel='example_group']");
        if(count($nodeLink)){
            $nodeImage = $nodeLink[0]->getElementsByTagName('img');
            if(count($nodeImage)){
                $productInfo->product_image = $urlHost.'/'.$nodeImage[0]->getAttribute('data-src');
            }

        }
        return $productInfo;
    }

}
