<link rel="stylesheet" href="{{\App\Common\AppCommon::assetPublic('css/guest/libs/jquery.fancybox.css')}}">
<link rel="stylesheet" href="{{\App\Common\AppCommon::assetPublic('css/guest/libs/jquery.bxslider.css')}}">
<div id="info" class="block-product">
    <div id="sanpham" class="mt-30">
        <div class="noidung">
            <div class="row">
                <div class="product-gallery col-md-6 col-sm-6 col-xs-12">
                    <div class="gallery row">
                        <div class="full col-md-9 col-sm-9 col-xs-9 pull-left">
                            <a rel="example_group"
                               href="{{\App\Common\ImageCommon::showImage($product->product_image)}}">
                                <img data-src="{{\App\Common\ImageCommon::showImage($product->product_image)}}"
                                     src="{{\App\Common\ImageCommon::showImage($product->product_image)}}"
                                     alt="{{$product->product_name}}"></a>
                        </div>
                        <div class="hidden">
                        </div>
                        <div class="previews col-md-2 col-sm-2 col-xs-3 pull-left">
                            <div class="bx-wrapper" style="max-width: 100%;">
                                <div class="bx-viewport" aria-live="polite"
                                     style="width: 100%; overflow: hidden; position: relative; height: 40px;">
                                    <ul class="bx-slider" style="width: auto; position: relative; transition-duration: 0s; transform: translate3d(0px, -44.4531px, 0px);">
                                        <li class="item-thumbnail"
                                            style="float: none; list-style: none; position: relative; width: 31px; margin-bottom: 5px;"
                                            aria-hidden="false"><a
                                                    data-original="{{\App\Common\ImageCommon::showImage($product->product_image)}}"
                                                    data-full="{{\App\Common\ImageCommon::showImage($product->product_image)}}"><img
                                                        src="{{\App\Common\ImageCommon::showImage($product->product_image)}}"/></a>
                                        </li>
                                        @if(isset($product->images) && count($product->images) > 0)
                                            @foreach($product->images as $image)
                                                <li class="item-thumbnail"
                                                    style="float: none; list-style: none; position: relative; width: 31px; margin-bottom: 5px;"
                                                    aria-hidden="false"><a
                                                            data-original="{{\App\Common\ImageCommon::showImage($image->image_src)}}"
                                                            data-full="{{\App\Common\ImageCommon::showImage($image->image_src)}}"><img
                                                                src="{{\App\Common\ImageCommon::showImage($image->image_src)}}"></a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <div class="icon-share col-md-9 col-sm-9 col-xs-8">
                            <span>Share : </span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{route('product_detail',['slug' => $product->slug])}}"
                               target="blank">
                                <img src="{{\App\Common\AppCommon::assetPublic('images/guest/facebook.png')}}"
                                     alt="Share on Facebook">
                            </a>
                            <a href="https://twitter.com/home?status={{route('product_detail',['slug' => $product->slug])}}"
                               target="blank">
                                <img src="{{\App\Common\AppCommon::assetPublic('images/guest/twitter.png')}}"
                                     alt="Share on Twitter">
                            </a>
                            <a href="https://plus.google.com/share?url={{route('product_detail',['slug' => $product->slug])}}">
                                <img src="{{\App\Common\AppCommon::assetPublic('images/guest/google.png')}}"
                                     alt="Share on Google+">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="product-info col-md-6 col-sm-6 col-xs-12">
                    <div class="product-details-header">
                        <h1>CAB-38</h1>
                        <p class="desktop-sku" align="center">Mã SP: <span itemprop="productID">{{$product->product_code}}</span></p>
                        <div>
                            <div class="summary-link">
                                <div class="rating desktop-sku">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="desktop-sku">( 77 Reviews )</p>
                            </div>
                        </div>
                        <div class="price-priamy">
                            <div class="price">Giá: Liên Hệ</div>
                        </div>
                        <div class="description"></div>

                    </div>
                </div>
            </div>
            <div class="product-detail">
            </div>
            <div class="comment">
                <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid_desktop"
                     data-href="{{route('product_detail',['slug' => $product->slug])}}" data-width="100%" data-numposts="5"
                     fb-xfbml-state="rendered"
                     fb-iframe-plugin-query="app_id=1577805669146955&amp;container_width=697&amp;height=100&amp;href=http%3A%2F%2Fsaonamviet.net%2Fsan-pham%2Fcab38.html&amp;locale=en_US&amp;numposts=5&amp;sdk=joey&amp;version=v2.8"
                     style="width: 100%;"><span style="vertical-align: bottom; width: 100%; height: 178px;"><iframe
                                name="fac91f6ef2424" width="1000px" height="100px"
                                title="fb:comments Facebook Social Plugin" frameborder="0" allowtransparency="true"
                                allowfullscreen="true" scrolling="no" allow="encrypted-media"
                                src="https://www.facebook.com/v2.8/plugins/comments.php?app_id=1577805669146955&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D44%23cb%3Df3f5b612c0570bc%26domain%3Dsaonamviet.net%26origin%3Dhttp%253A%252F%252Fsaonamviet.net%252Ff20a3aad6195628%26relation%3Dparent.parent&amp;container_width=697&amp;height=100&amp;href=http%3A%2F%2Fsaonamviet.net%2Fsan-pham%2Fcab38.html&amp;locale=en_US&amp;numposts=5&amp;sdk=joey&amp;version=v2.8"
                                style="border: none; visibility: visible; width: 100%; height: 178px;"
                                class=""></iframe></span></div>
            </div>
        </div>
        <h3 class="headline">Các sản phẩm khác</h3>
        <div class="row">
            @foreach($productSameTypes as $productSame)
                <div class="items-product col-md-3 col-sm-3 col-xs-6">
                    <div class="_item_prd">
                        <div class="_img_prd">
                            <div class="_img">
                                <a href="{{route('product_detail',['slug' => $productSame->slug])}}">
                                    <img src="{{\App\Common\ImageCommon::showImage($productSame->product_image)}}"
                                            alt="{{$productSame->product_name}}" style="height: 160px"></a>
                            </div>
                            <h3><a href="{{route('product_detail',['slug' => $product->slug])}}">{{$productSame->product_name}}</a></h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>