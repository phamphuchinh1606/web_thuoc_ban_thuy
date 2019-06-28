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
                        <div id="info" class="block-product">
                            <div id="sanpham">
                                <h2 class="content-title">{{$blog->blog_title}}</h2>
                                <section class="content-date">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    Ngày đăng: {{$blog->str_post_date}} - <i class="fa fa-bar-chart" aria-hidden="true"></i> Lượt xem : 134
                                </section>
                                <div class="noidung">
                                    {!! $blog->blog_content !!}

                                    <div id="comment"
                                         data-url="{{route('blog_detail',['slug' => $blog->slug])}}">
                                        <div id="fb-root"></div>

                                        <div class="fb-comments" data-width="100%"
                                             data-href="{{route('blog_detail',['slug' => $blog->slug])}}"
                                             data-numposts="5"></div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection