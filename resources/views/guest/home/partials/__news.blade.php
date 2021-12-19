<div class="news-bottom">
    <div class="container">
        <div class="row mt-30">
            <div class="news-nb col-md-5 col-sm-5 col-xs-12">
                <h3 class="head-news"><span>Tin tức</span>/<small><a href="{{route('blog')}}">+Xem thêm</a></small></h3>
                <ul>
                    @foreach($blogNews as $blog)
                        <li class="item_news_home">
                            <h3>
                                <a href="{{route('blog_detail',['slug' => $blog->slug])}}">{{$blog->blog_title}}</a>
                            </h3>
                            <p><small>{{\App\Common\AppCommon::dateFormat($blog->post_date)}}</small></p>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="list-nb col-md-7 col-sm-7 col-xs-12">
                <div class="list-prd">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="col-desc">
                                <h3>Sản phẩm</h3>
                                <p>Sản phẩm thang máy mang thương hiệu Center được khách hàng chấp thuận và đánh giá cao.</p>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12 ul-list">
                            <ul>
                                @foreach($productTypes as $productType)
                                    <li>
                                        <a href="{{route('collection',['slug' => $productType->slug])}}">
                                            <img src="{{\App\Common\ImageCommon::showImage($productType->image_icon)}}">
                                        </a>
                                        <h4>
                                            <a href="{{route('collection',['slug' => $productType->slug])}}">{{$productType->product_type_name}}</a>
                                        </h4>
                                    </li>
                                @endforeach
                                <div class="clear"></div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
