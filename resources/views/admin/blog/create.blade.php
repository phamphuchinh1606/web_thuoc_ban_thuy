@extends('admin.layouts.master')

@section('head.title','Tạo mới tin tức')

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
    {{ Breadcrumbs::render('admin.blog.create') }}
@endsection

@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-8">
                            <form method="post" action="{{route('admin.blog.create')}}" enctype="multipart/form-data" id="form">
                                @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <i class="icon-note"></i> Tạo Mới Tin Tức
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Tiêu Đề</label>
                                            <div class="col-md-10">
                                                <input class="form-control" id="text-input" type="text" name="blog_title" placeholder="Tiêu đề">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Slug</label>
                                            <div class="col-md-10">
                                                <input class="form-control" id="text-input" type="text" name="blog_slug" placeholder="Slug" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Ngày Đăng</label>
                                            <div class="col-md-10">
                                                <input class="form-control date-picker" id="date" type="text" name="post_date">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Công khai</label>
                                            <div class="col-md-10">
                                                <label class="switch switch-label switch-outline-primary-alt">
                                                    <input class="switch-input" type="checkbox" checked="" name="is_public">
                                                    <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Mô tả ngắn</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="blog_description" rows="9" placeholder="Nhập mô tả ngắn tin tức"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Nội dung tin tức</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-12">
{{--                                                        <input type="hidden" value="phamphuchinh" class="editor" name="blog_content"/>--}}
{{--                                                        <div id="editor" class="ql-container ql-snow editor_quill product_content">--}}

{{--                                                        </div>--}}
                                                        <textarea class="form-control" id="summary-ckeditor" name="blog_content" style="height: 400px"></textarea>
                                                        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                                                        <script>
                                                            CKEDITOR.replace( 'summary-ckeditor', {
                                                                filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
                                                                filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
                                                                filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
                                                                {{--filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',--}}
                                                                        {{--filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',--}}
                                                                filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
                                                            } );
                                                            CKEDITOR.on('instanceLoaded', function(e) {e.editor.resize('100%', 700)} );
                                                        </script>
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
                                            <i class="fa fa-dot-circle-o"></i>Tạo Mới</button>
                                        <button class="btn btn-sm btn-danger" type="reset">
                                            <i class="fa fa-ban"></i> Reset</button>
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
                                                    <img id="imgHandle" src="http://beats-city.amagumolabs.io/images/upload/no_image_available.jpg">
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
