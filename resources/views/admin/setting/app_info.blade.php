<?php use App\Common\Constant; ?>

@extends('admin.layouts.master')

@section('head.title','Thông Tin Hệ Thống')

@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div class="row">
                <div class="col-sm-12 col-xl-8">
                    <form action="{{route('admin.setting.app.update')}}" method="post"  enctype="multipart/form-data" id="form">
                        @csrf
                        <input type="hidden" value="{{$appInfo->id}}" name="app_id"/>
                        <div class="card list-image">
                            <div class="card-header">
                                <i class="fa fa-align-justify"></i>Thông Tin Hệ Thống
                            </div>
                            <div class="card-body">
                                <div class="carousel slide" data-ride="carousel">

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="text-input">Tên App</label>
                                        <div class="col-md-10">
                                            <input class="form-control" id="app_name" type="text" name="app_name" placeholder="Tên app"
                                                value="{{$appInfo->app_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="text-input">Số Điện Thoại</label>
                                        <div class="col-md-10">
                                            <input class="form-control" id="app_phone" type="text" name="app_phone" placeholder="Số điện thoại"
                                                   value="{{$appInfo->app_phone}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="text-input">Số Fax</label>
                                        <div class="col-md-10">
                                            <input class="form-control" id="app_fax" type="text" name="app_fax" placeholder="Số fax"
                                                   value="{{$appInfo->app_fax}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="text-input">Email</label>
                                        <div class="col-md-10">
                                            <input class="form-control" id="app_email" type="email" name="app_email" placeholder="Địa chỉ email"
                                                   value="{{$appInfo->app_email}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="text-input">Facebook Name</label>
                                        <div class="col-md-10">
                                            <input class="form-control" id="app_facebook" type="text" name="app_facebook" placeholder="Tên Facebook"
                                                   value="{{$appInfo->app_facebook}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="text-input">Địa Chỉ</label>
                                        <div class="col-md-10">
                                            <input class="form-control" id="app_address" type="text" name="app_address" placeholder="Địa chỉ"
                                                   value="{{$appInfo->app_address}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="text-input">Địa chỉ google map</label>
                                        <div class="col-md-10">
                                            <input class="form-control" id="app_address_google_map" type="text" name="app_address_google_map" placeholder="Địa chỉ google map"
                                                   value="{{$appInfo->app_address_google_map}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="text-input">Title ChatBox</label>
                                        <div class="col-md-10">
                                            <input class="form-control" id="app_title_chat_box" type="text" name="app_title_chat_box" placeholder="Tiều đề chat box"
                                                   value="{{$appInfo->app_title_chat_box}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="text-input">Link Fanpage</label>
                                        <div class="col-md-10">
                                            <input class="form-control" id="app_link_facebook_fanpage" type="text" name="app_link_facebook_fanpage" placeholder="Địa chỉ facebook fanpage"
                                                   value="{{$appInfo->app_link_facebook_fanpage}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="text-input">Link Twitter</label>
                                        <div class="col-md-10">
                                            <input class="form-control" id="app_link_twitter" type="text" name="app_link_twitter" placeholder="Địa chỉ twitter"
                                                   value="{{$appInfo->app_link_twitter}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="text-input">Link Youtue</label>
                                        <div class="col-md-10">
                                            <input class="form-control" id="app_link_youtube" type="text" name="app_link_youtube" placeholder="Địa chỉ youtube"
                                                   value="{{$appInfo->app_link_youtube}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="text-input">Link Instagram</label>
                                        <div class="col-md-10">
                                            <input class="form-control" id="app_link_instagram" type="text" name="app_link_instagram" placeholder="Địa chỉ instagram"
                                                   value="{{$appInfo->app_link_instagram}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="text-input">Video Tạo Sản Phẩm 1</label>
                                        <div class="col-md-10">
                                            <input class="form-control" id="app_make_product_video_one" type="text" name="app_make_product_video_one" placeholder="Video tạo sản phẩm 1"
                                                   value="{{$appInfo->app_make_product_video_one}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="text-input">Video Tạo Sản Phẩm 2</label>
                                        <div class="col-md-10">
                                            <input class="form-control" id="app_make_product_video_two" type="text" name="app_make_product_video_two" placeholder="Video tạo sản phẩm 2"
                                                   value="{{$appInfo->app_make_product_video_two}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="text-input">Nội dung mô tả</label>
                                        <div class="col-md-10">
                                            <input class="form-control" id="app_content" type="text" name="app_content" placeholder="Nội dung mô tả"
                                                   value="{{$appInfo->app_content}}"/>
                                        </div>
                                    </div>
                                    <div class="hide">
                                        <input type="file" name="app_icon" id="app_icon"/>
                                        <input type="text" name="app_src_icon" value="{{$appInfo->app_src_icon}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-primary pull-right" type="submit">
                                    <i class="fa fa-dot-circle-o"></i> Cập Nhật
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-sm-12 col-xl-4">
                    <div class="card list-image">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Icon Hệ Thống
                        </div>
                        <div class="card-body">
                            <div class="box box-warning">
                                <div class="box-body">
                                    <div class="upload__area-image">
                                                <span>
                                                    @if(isset($appInfo->app_src_icon))
                                                        <img id="imgHandle" src="{{\App\Common\ImageCommon::showImage($appInfo->app_src_icon)}}">
                                                    @else
                                                        <img id="imgHandle" src="http://beats-city.amagumolabs.io/images/upload/no_image_available.jpg">
                                                    @endif

                                                    <label for="imgAnchorInput">Upload image</label>
                                                </span>
                                        <p>
                                            <small>(Vui lòng chọn ảnh có đuôi là : jpeg, png, jpg, gif, svg.)</small><br/>
                                            <small>(Kích thước hình ảnh phù hợp : 228x70)</small>
                                        </p>
                                    </div>
                                    <div class="form__upload">

                                        <div class="form-inline-simple">
                                            <input type="file" class="'form-control" id="imgAnchorInput" onchange="loadFile(event)">
                                        </div>
                                        <script>
                                            var loadFile = function(event) {
                                                var output = document.getElementById('imgHandle');
                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                document.getElementById('app_icon').files = event.target.files;
                                            };
                                        </script>
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
