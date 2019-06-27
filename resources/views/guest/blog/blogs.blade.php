@extends('guest.layouts.master')

@section('body.content')
    <div id="wrapper">
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="left-content col-md-3 col-sm-3 col-xs-12 pull-left mt-20">
                        @include('guest.common.__left_product_type_list')
                    </div>

                    <div class="left-content col-md-9 col-sm-9 col-xs-12 pull-right mt-20">
                        <div id="info">
                            <div class="row-news">

                                <div class="">
                                    <div class="items-news">
                                        <a href="{{route('blog_detail')}}"><img src="http://saonamviet.net/upload/baiviet/chonnoithatcabinthangmay-3322_280x200.jpg" onerror="this.src='images/noimage.png';" alt="Trang trí nội thất thang máy Cabin"></a>
                                        <h3><a href="{{route('blog_detail')}}">Trang trí nội thất thang máy Cabin</a></h3>
                                        <span style=" color:rgba(153,153,153,1);">Post : 24/11/2017 - 10:28 AM</span><br>
                                        <p>Sau khi thang máy được lắp đặt, bạn sẽ quan tâm tới không gian bên trong cabin thang máy. Bạn đang băn khoăn có nên trang..</p>
                                        <div class="xemtiep"><a href="{{route('blog_detail')}}">Xem Tiếp </a></div>
                                        <div class="clear"></div>
                                    </div>
                                </div>

                                <div class="">
                                    <div class="items-news">
                                        <a href="{{route('blog_detail')}}"><img src="http://saonamviet.net/upload/baiviet/quytrinhthanhlap-5195_280x200.jpg" onerror="this.src='images/noimage.png';" alt="Những điều nên và không nên làm khi sử dụng thang máy (P1)"></a>
                                        <h3><a href="{{route('blog_detail')}}">Những điều nên và không nên làm khi sử dụng thang máy (P1)</a></h3>
                                        <span style=" color:rgba(153,153,153,1);">Post : 24/11/2017 - 10:27 AM</span><br>
                                        <p>Sử dụng thang máy đúng cách giúp đảm bảo vận hành an toàn và thoải mái cho mọi hành khách. Hãy tuân theo..</p>
                                        <div class="xemtiep"><a href="{{route('blog_detail')}}">Xem Tiếp </a></div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="">
                                    <div class="items-news">
                                        <a href="{{route('blog_detail')}}"><img src="http://saonamviet.net/upload/baiviet/taxblog-5285_280x200.jpg" onerror="this.src='images/noimage.png';" alt="Những điều nên và không nên làm khi sử dụng thang máy (P2)"></a>
                                        <h3><a href="{{route('blog_detail')}}">Những điều nên và không nên làm khi sử dụng thang máy (P2)</a></h3>
                                        <span style=" color:rgba(153,153,153,1);">Post : 24/11/2017 - 10:27 AM</span><br>
                                        <p>Quan sát và hành động hợp lý có thể giúp phòng tránh thương tích khi sử dụng thang máy. Không nên sử dụng..</p>
                                        <div class="xemtiep"><a href="{{route('blog_detail')}}">Xem Tiếp </a></div>
                                        <div class="clear"></div>
                                    </div>
                                </div>

                                <div class="">
                                    <div class="items-news">
                                        <a href="{{route('blog_detail')}}"><img src="http://saonamviet.net/upload/baiviet/dautunuocngoai-2076_280x200.jpg" onerror="this.src='images/noimage.png';" alt="Những điều cần biết khi mua thang máy gia đình"></a>
                                        <h3><a href="{{route('blog_detail')}}">Những điều cần biết khi mua thang máy gia đình</a></h3>
                                        <span style=" color:rgba(153,153,153,1);">Post : 24/11/2017 - 10:26 AM</span><br>
                                        <p>Để cuộc sống thêm hiện đại, tiện nghi hơn, cùng với đó là công nghệ tiên tiến và phát triển ngày một vượt bậc..</p>
                                        <div class="xemtiep"><a href="{{route('blog_detail')}}">Xem Tiếp </a></div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="clear"></div>                  <div align="center"><div class="paging"></div></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection