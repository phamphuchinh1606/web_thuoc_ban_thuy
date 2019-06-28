<div class="product-hightlight">
    <h3 class="headline">Sản phẩm nổi bật</h3>
    <div class="list container">
        <div class="row">
            @foreach($productHots as $product)
                <div class="items-product col-md-3 col-sm-3 col-xs-6">
                    <div class="_item_prd">
                        <div class="_img_prd">
                            <div class="_img">
                                <a href="{{route('product_detail',['slug' => $product->slug, 'id' => $product->id])}}">
                                    <img src="{{\App\Common\ImageCommon::showImage($product->product_image)}}" alt="{{$product->product_name}}" style="height: 250px">
                                </a>
                            </div>
                            <h3><a href="{{route('product_detail',['slug' => $product->slug, 'id' => $product->id])}}">{{$product->product_name}}</a></h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>