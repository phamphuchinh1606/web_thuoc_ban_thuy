<?php

namespace App\Http\Controllers\Guest;

use App\Common\AppCommon;
use App\Common\Constant;
use App\Common\ImageCommon;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use StdClass;

class ProductDetailController extends Controller
{
    public function index($slug = null, $id = 1){
        $product = $this->productService->getInfoProduct($id);
        $productHots = $this->productService->getListProductHot(4);
        $productSameTypes = new StdClass();
        if(isset($product)){
            $productSameTypes = $this->productService->getListProductSameType($product->id,$product->product_type_id);
        }
        return view('guest.product.product_detail',[
            'product' => $product,
            'productSameTypes' => $productSameTypes,
            'productHots' => $productHots
        ]);
    }

    public function quickViewProduct($slug = null,$id){
        $product = $this->productService->getInfoProduct($id);
        return response()->json($this->parseProductJson($product));
        return $data;
    }

    private function parseProductJson($product){
        $productJson = new StdClass();
        if(isset($product)){
            $productJson->available = true;
            $productJson->compare_at_price_max = $product->product_cost_price;
            $productJson->compare_at_price_min = $product->product_cost_price;
            $productJson->compare_at_price_varies = false;
            $productJson->compare_at_price = $product->product_cost_price;
            $productJson->content = AppCommon::showText($product->product_content);
            $productJson->description = AppCommon::showText($product->product_description);
            $productJson->featured_image = ImageCommon::showImage($product->product_image);
            $productJson->id = $product->id;
            $images = [];
            foreach ($product->images as $imageItem){
                array_push($images,ImageCommon::showImage($imageItem->image_src));
            }
            $productJson->images = $images;
            $productJson->price = $product->product_price;
            $productJson->price_max = $product->product_price;
            $productJson->price_min = $product->product_price;
            $productJson->price_varies = false;
            $productJson->title = $product->product_name;
            $productJson->metadescription = AppCommon::showText($product->product_description);

            $productJson->options = [];
            $productJson->vendor =  AppCommon::showText($product->vendor_name);
            $productJson->price = $product->product_price;
            $productJson->compare_at_price = $product->product_cost_price;

            $productJson->url = route('product_detail',['slug' => $product->slug, 'id' => $product->id]);
            $variant = new StdClass();
            $variant->available = true;
            $variant->compare_at_price = $product->product_cost_price;
            $variant->inventory_quantity = "1";
            $variant->price = $product->product_price;
            $variant->sku = $product->product_code;
            $variant->id = $product->id;
            $variant->title = $product->product_name;
            $productJson->variants = [$variant];
        }
        return $productJson;
    }

    public function search(Request $request){
        $searchInfo = new \StdClass();
        $sortBy = null;
        $searchInfo->product_name = $request->product_name;
        $products = $this->productService->getListProductByProductType(null,$sortBy,$searchInfo);
        return view('guest.search.search_product',[
            'products' => $products,
        ]);
    }

    private function createDataProductTemp(){
        $product = new stdClass();
        $product->title = "Ví da khắc tên cao cấp 01";
        $product->metadescription = "Mẫu giày cao gót CG09030 là lựa chọn hàng đầu của các cô gái yêu thích phong cách sang trọng và thanh lịch, cùng nàng tỏa sáng mọi lúc mọi nơi.";
        $product->options = [];
        $product->vendor = "vendor";
        $product->price = "43500000";
        $product->compare_at_price = "50000000";
        $product->description = "Bạn đang quan tâm đến ví da khắc tên! Thế bạn có biết những gì người ta thường hay khắc trên ví da không? Có vô số thứ người ta có thể khắc lên ví, vậy thì nên khắc chữ gì lên ví da? Nào là tên, ảnh chân dung, 12 con giáp, logo công an,… đều khắc được cả.";
        $product->url = route('product_detail',['id' => 1]);
        $product->images = [asset('images/guest/product/vinam/product_1.jpg'),
            asset('images/guest/product/vinam/product_2.jpg'),
            asset('images/guest/product/vinam/product_3.jpg'),
            asset('images/guest/product/vinam/product_4.jpg'),
            asset('images/guest/product/vinam/product_5.jpg')
        ];
        $product->featured_image = asset('images/guest/product/vinam/product_1.jpg');
        $variant = new StdClass();
        $variant->available = true;
        $variant->compare_at_price = "51000000";
        $variant->inventory_quantity = "1";
        $variant->price = "43500000";
        $variant->sku = "CG09030";
        $variant->id = "1019623681";
        $variant->title = "Ví da khắc tên cao cấp 01";
        $product->variants = [$variant];
        return $product;
    }
}
