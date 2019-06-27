<?php use App\Common\Constant; ?>

@extends('admin.layouts.master')

@section('head.title','Cập nhật tin tức')

@section('head.css')
    <link href="{{asset('css/admin/plugins/quill.snow.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/admin/plugins/dropzone.css')}}">
    <link href="{{asset('css/admin/dropzon_custom.css')}}" rel="stylesheet">
    <link href="{{asset('/css/admin/plugins/daterangepicker.css')}}" rel="stylesheet">
@endsection

@section('body.js')
    <script src="{{asset('js/admin/plugins/quill.min.js')}}"></script>
    <script src="{{asset('js/admin/plugins/text-editor.js')}}"></script>
    <script src="{{asset('js/admin/plugins/jquery.maskedinput.js')}}"></script>
    <script src="{{asset('js/admin/plugins/moment.min.js') }}" type='text/javascript'></script>
    <script src="{{asset('js/admin/plugins/daterangepicker.min.js') }}" type='text/javascript'></script>
    <script src="{{asset('js/admin/date-picker.js') }}" type='text/javascript'></script>
@endsection
@section('body.breadcrumb')
    {{ Breadcrumbs::render('admin.blog.edit',$blog->blog_title) }}
@endsection

@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-8">
                            <form method="post" action="{{route('admin.blog.update',['id' => $blog->id])}}" enctype="multipart/form-data" id="form">
                                @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <i class="icon-note"></i> Cập nhật tin tức
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Tiêu Đề</label>
                                            <div class="col-md-10">
                                                <input class="form-control" id="text-input" type="text" name="blog_title" placeholder="Tiêu đề"
                                                    value="{{$blog->blog_title}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Slug</label>
                                            <div class="col-md-10">
                                                <input class="form-control" id="text-input" type="text" name="blog_slug" placeholder="Slug" disabled
                                                       value="{{$blog->slug}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Ngày Đăng</label>
                                            <div class="col-md-10">
                                                <input class="form-control date-picker" id="date" type="text" name="post_date"
                                                    value="{{$blog->post_date}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Công khai</label>
                                            <div class="col-md-10">
                                                <label class="switch switch-label switch-outline-primary-alt">
                                                    <input class="switch-input" type="checkbox" {{$blog->is_check_public}} name="is_public">
                                                    <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Mô tả ngắn</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="blog_description" rows="9" placeholder="Nhập mô tả ngắn tin tức">{{$blog->blog_description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Nội dung tin tức</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="hidden" value="{{$blog->blog_content}}" class="editor" name="blog_content"/>
                                                        <div id="editor" class="ql-container ql-snow editor_quill product_content">
                                                            {!! $blog->blog_content !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-none">
                                            <input type="file" class="'form-control" id="blog_image" name="blog_image"/>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-sm btn-primary" type="submit">
                                            <i class="fa fa-dot-circle-o"></i>Cập Nhật</button>
                                        <button class="btn btn-sm btn-danger" type="reset">
                                            <i class="fa fa-ban"></i> Hủy</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> Hình Ảnh
                                    <small>slides only</small>
                                </div>
                                <div class="card-body">
                                    <div class="box box-warning">
                                        <div class="box-body">
                                            <div class="upload__area-image">
                                                <span>
                                                    <img id="imgHandle" src="{{asset(Constant::$PATH_URL_UPLOAD_IMAGE.$blog->blog_image)}}">
                                                    <label for="imgAnchorInput">Upload image</label>
                                                </span>
                                                <p><small>(Please upload a file of type: jpeg, png, jpg, gif, svg.)</small></p>
                                            </div>
                                            <div class="form__upload">

                                                <div class="form-inline-simple">
                                                    <input type="file" class="'form-control" id="imgAnchorInput" onchange="loadFile(event)">
                                                </div>
                                                <script>
                                                    var loadFile = function(event) {
                                                        var output = document.getElementById('imgHandle');
                                                        output.src = URL.createObjectURL(event.target.files[0]);
                                                        document.getElementById('blog_image').files = event.target.files;
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

        </div>
    </div>

@endsection
