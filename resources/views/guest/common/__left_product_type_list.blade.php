<div class="moulde-left mt-40">
    <h3>Danh mục sản phẩm</h3>
    <div class="_nav_left">
        <ul class="edlc-collapsible-nav" style="z-index: 998;">
            @foreach($productTypes as $productType)
                <li data-collapsed-height="42" style="z-index: 996; height: 43px;">
                    <div style="z-index: 997;"><a href="{{route('collection',['slug' => $productType->slug])}}"><i class="fa fa-caret-right"></i> {{$productType->product_type_name}}</a></div>
                </li>
            @endforeach
        </ul>
    </div>
</div>