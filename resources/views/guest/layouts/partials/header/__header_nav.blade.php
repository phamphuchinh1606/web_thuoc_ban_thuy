<div class="fix-nav">
    <div class="container p-relative">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="nav-rp">
                    <a href="#nav-rp"><img src="{{\App\Common\AppCommon::assetPublic('images/guest/nav-rp.png')}}" alt="Menu"></a>
                </div>
                <div class="logo">
                    <a href="">
                        <img src="{{\App\Common\ImageCommon::showImage($appInfo->app_src_icon)}}" alt="{{$appInfo->app_name}}">
                        <span style="font-family: 'Open Sans', sans-serif;font-size: 14px;font-weight: bold">TOÀN THẮNG ELEVATOR</span>
                    </a>
                </div>
                <div class="clear"></div>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12 hidden-rp">
                <div class="navigation">
                    <div id="menu"><!--menu-->
                        <div class="inner"><!--inner-->
                            <ul class="pull-right">
                                <li><a href="{{route('about')}}" class="font_custom ">Giới thiệu</a></li>
                                <li>
                                    <a href="{{route('collection_all')}}"  class="font_custom  border-none">Sản phẩm</a>
                                    <ul>
                                        @foreach($productTypes as $productType)
                                            <li>
                                                <a href="{{route('collection',['slug' => $productType->slug])}}">{{$productType->product_type_name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{route('collection_equipment_all')}}">Thiết bị</a>
                                    <ul>
                                        @foreach($equipmentTypes as $equipmentType)
                                            <li>
                                                <a href="{{route('collection_equipment',['slug' => $equipmentType->slug])}}">{{$equipmentType->equipment_type_name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{route('collection_design_all')}}">Thiết trí</a>
                                    <ul>
                                        @foreach($designTypes as $designType)
                                            <li>
                                                <a href="{{route('collection_design',['slug' => $designType->slug])}}">{{$designType->design_type_name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{route('out_source')}}"  class="font_custom  border-none">Gia công cơ khí</a></li>
                                <li><a href="{{route('blog')}}"  class="font_custom  border-none">Tin tức</a></li>
                                <!-- <li><a href="tin-tuc.html"  class="font_custom  border-none">Tin tức</a></li>    -->
                                <li><a href="{{route('contact')}}"  class="font_custom  border-none">Liên hệ</a></li>
                                <span class="clear"></span>
                            </ul>
                            <span class="clear"></span>
                        </div><!--#innner-->
                    </div><!--#menu-->
                    <div class="clear"></div>
                </div>                </div>
            <div class="clear"></div>
        </div>
    </div>
</div>