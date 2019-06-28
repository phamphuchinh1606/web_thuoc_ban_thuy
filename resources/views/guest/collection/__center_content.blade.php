<div id="info" class="block-product">
    <h3 class="headline">{{$productType->product_type_name}}</h3>

    <div class="row">
        @foreach($products as $product)
            <div class="items-product col-md-4 col-sm-4 col-xs-6">
                <div class="_item_prd">
                    <div class="_img_prd">
                        <div class="_img">
                            <a href="{{route('product_detail',['slug' => $product->slug])}}">
                                <img src="{{\App\Common\ImageCommon::showImage($product->product_image)}}"
                                     alt="{{$product->product_name}}" class="product_image">
                            </a>
                        </div>
                        <h3>
                            <a href="{{route('product_detail',['slug' => $product->slug])}}">{{$product->product_name}}</a>
                        </h3>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="clear"></div>
    {{$products->links('both.common.view_pagging')}}
{{--    <div class="paging">--}}
{{--        <ul class="pagination">--}}
{{--            <li class="page_info">Trang 1 of 8</li>--}}
{{--            <li><a class="current">1</a></li>--}}
{{--            <li><a href="http://saonamviet.net/san-pham.html&amp;page=2">2</a></li>--}}
{{--            <li><a href="http://saonamviet.net/san-pham.html&amp;page=3">3</a></li>--}}
{{--            <li><a href="http://saonamviet.net/san-pham.html&amp;page=4">4</a></li>--}}
{{--            <li><a href="http://saonamviet.net/san-pham.html&amp;page=5">5</a></li>--}}
{{--            <li><a href="http://saonamviet.net/san-pham.html&amp;page=6">6</a></li>--}}
{{--            <li><a href="http://saonamviet.net/san-pham.html&amp;page=7">7</a></li>--}}
{{--            <li><a href="http://saonamviet.net/san-pham.html&amp;page=8">8</a></li>--}}
{{--            <li><a href="http://saonamviet.net/san-pham.html&amp;page=2">Next</a></li>--}}
{{--            <li><a href="http://saonamviet.net/san-pham.html&amp;page=8">Last</a></li>--}}
{{--        </ul>--}}
{{--    </div>--}}
</div>
<h1 class="visit_hidden">VIETNAM ELEVATOR CENTER</h1>
