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
                                @foreach($blogs as $blog)
                                    <div class="">
                                        <div class="items-news">
                                            <a href="{{route('blog_detail',['slug' => $blog->slug])}}">
                                                <img src="{{\App\Common\ImageCommon::showImage($blog->blog_image)}}"
                                                     onerror="this.src='images/noimage.png';"
                                                     alt="{{$blog->blog_title}}"></a>
                                            <h3>
                                                <a href="{{route('blog_detail',['slug' => $blog->slug])}}">{{$blog->blog_title}}</a>
                                            </h3>
                                            <span style=" color:rgba(153,153,153,1);">Post : {{\App\Common\AppCommon::dateFormat($blog->post_date)}}</span><br>
                                            <p>{{\App\Common\AppCommon::showTextDot($blog->blog_description,200)}}</p>
                                            <div class="xemtiep"><a href="{{route('blog_detail',['slug' => $blog->slug])}}">Xem Tiếp </a></div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="clear"></div>
                                @if(count($blogs) > 6)
                                    <div align="center">
                                        {{$blogs->links('both.common.view_pagging')}}
                                    </div>
                                @endif
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection