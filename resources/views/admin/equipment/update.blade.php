<?php use App\Common\Constant; ?>

@extends('admin.layouts.master')

@section('head.title','Cập nhật thiết bị')

@section('head.css')
    <link href="{{asset('css/admin/plugins/quill.snow.css')}}" rel="stylesheet">
    {{--<link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{asset('css/admin/plugins/dropzone.css')}}">
    <link href="{{asset('css/admin/dropzon_custom.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin/product.css')}}" rel="stylesheet">
@endsection

@section('body.js')
    <script src="{{asset('js/admin/plugins/quill.min.js')}}"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.min.js"></script>--}}
    <script src="{{asset('js/admin/plugins/text-editor.js')}}"></script>
    <script src="{{asset('js/admin/product.js')}}"></script>
@endsection

@section('body.breadcrumb')
    {{ Breadcrumbs::render('admin.equipment.edit', $product->product_name) }}
@endsection

@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-8">
                            <form method="post" action="{{route('admin.equipment.update',['id' => $product->id])}}" enctype="multipart/form-data" id="form">
                                @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <i class="icon-note"></i> Tạo Mới thiết bị
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Tên thiết bị</label>
                                            <div class="col-md-10">
                                                <input class="form-control" id="text-input" type="text" name="product_name" placeholder="Tên thiết bị"
                                                    value="{{ $product->product_name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Mã thiết bị</label>
                                            <div class="col-md-10">
                                                <input class="form-control" id="text-input" type="text" name="product_code" placeholder="Mã thiết bị"
                                                       value="{{ $product->product_code }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Công khai thiết bị</label>
                                            <div class="col-md-10">
                                                <label class="switch switch-label switch-outline-primary-alt">
                                                    <input class="switch-input" type="checkbox" checked="" name="is_public">
                                                    <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Mô tả ngắn thiết bị</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="product_description" rows="9" placeholder="Nhập mô tả ngắn thông tin thiết bị">{{$product->product_description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Nội dung thiết bị</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <textarea class="form-control" id="summary-ckeditor" name="product_content" style="height: 400px">{{$product->product_content}}</textarea>
                                                        <script src="{{ \App\Common\AppCommon::assetPublic('ckeditor/ckeditor.js') }}"></script>
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
                                            <input type="file" class="'form-control" id="product_main_image" name="product_main_image"/>
                                            <div class="root_product_images">
                                                <input type="hidden" class="'form-control product_images" name="product_images[]" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-sm btn-primary" type="submit">
                                            <i class="fa fa-dot-circle-o"></i> Cập Nhật </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> Hình Ảnh Chính
                                    <small>slides only</small>
                                </div>
                                <div class="card-body">
                                    <div class="box box-warning">
                                        <div class="box-body">
                                            <div class="upload__area-image">
                                                <span>
                                                    <img id="imgHandle" src="{{asset(Constant::$PATH_URL_UPLOAD_IMAGE.$product->product_image)}}">
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
                                                        document.getElementById('product_main_image').files = event.target.files;
                                                    };
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card product-list-image">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> Danh sách hình ảnh phụ
                                </div>
                                <div class="card-body">
                                    <div class="carousel slide"  data-ride="carousel">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAddImage"
                                                        aria-expanded="true" aria-controls="collapseExample"
                                                        data-placement="top" data-toggle="tooltip" title data-original-title="Them Hinh">
                                                    <i class="fa fa-upload fa-lg"></i>
                                                </button>
                                            </div>
                                            <div class="col-md-8 collapse" id="collapseAddImage">
                                                <form action="{{route('admin.product.image.add',['productId' => $product->id])}}"
                                                        method="post" enctype="multipart/form-data" >
                                                    @csrf
                                                    <div class="text-right p-sm-1" id="btn_add_image" style="display: none">
                                                        <button type="submit" class="btn btn-primary">Thêm hình</button>
                                                    </div>
                                                    <div class="upload__area-image">
                                                    <span>
                                                        <img id="imgAdd" src="http://beats-city.amagumolabs.io/images/upload/no_image_available.jpg">
                                                        <label for="imageFileAdd">Upload image</label>
                                                    </span>
                                                        <p><small>(Please upload a file of type: jpeg, png, jpg, gif, svg.)</small></p>
                                                    </div>
                                                    <div class="form__upload">
                                                        <div class="form-inline-simple">
                                                            <input type="file" name="image_add" class="form-control imgAnchorInput" id="imageFileAdd" onchange="loadFileImage(event)">
                                                        </div>
                                                        <script>
                                                            var loadFileImage = function(event) {
                                                                var output = document.getElementById('imgAdd');
                                                                console.log(output);
                                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                                document.getElementById('btn_add_image').style.display = 'block';
                                                            };
                                                        </script>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @foreach($product->images as $image)
                                                <div class="col-md-6">
                                                    <img src="{{asset(Constant::$PATH_URL_UPLOAD_IMAGE.$image->image_src)}}"/>
                                                    <div>
                                                        <a data-toggle="modal" class="nav-link delete-image anchorClick"
                                                           data-url="{{route('admin.product.image.delete',['productId' => $product->id, 'id' => $image->id]) }}"
                                                           data-name="Hình ảnh" href="#deleteModal">
                                                           Xóa Ảnh
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
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
