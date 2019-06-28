@extends('admin.layouts.master')
@section('head.title','Tạo mới danh mục sản phẩm')
@section('head.css')
    <link href="{{asset('css/admin/product.css')}}" rel="stylesheet">
@endsection

@section('body.js')
    {{--<script src="{{asset('js/admin/switch.plugin.js')}}"></script>--}}
@endsection
@section('body.breadcrumb')
    {{ Breadcrumbs::render('admin.productType.create') }}
@endsection
@section('body.content')
    <div class="container-fluid product_type">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Tạo Mới Danh Mục</strong>
                                    <div class="card-header-actions">
                                        <a class="btn btn-block btn-outline-secondary active" href="{{route('admin.product_type.index')}}">
                                            Quay Lại
                                        </a>
                                    </div>
                                </div>
                                <form class="form-horizontal" action="{{route('admin.product_type.create')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="text-input">Tên Danh Mục</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="text-input" type="text" name="product_type_name" placeholder="Tên danh mục" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-lable" for="">Công Khai</label>
                                            <div class="col-md-9">
                                                <label class="switch switch-label switch-outline-primary-alt">
                                                    <input class="switch-input" type="checkbox" checked="checked" name="is_public">
                                                    <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-lable" for="">Icon Image</label>
                                            <div class="col-md-3">
                                                <div class="upload__area-image">
                                                <span>
                                                    <img id="imgAdd" src="http://beats-city.amagumolabs.io/images/upload/no_image_available.jpg">
                                                    <label for="imageFileAdd">Upload image</label>
                                                </span>
                                                    <p><small>( width: 20px , height: 20px)</small></p>
                                                </div>
                                                <div class="form__upload image_icon">
                                                    <div class="form-inline-simple">
                                                        <input type="file" name="image_icon" class="form-control imgAnchorInput" id="imageFileAdd" onchange="loadFileImage(event)">
                                                    </div>
                                                    <script>
                                                        var loadFileImage = function(event) {
                                                            var output = document.getElementById('imgAdd');
                                                            output.src = URL.createObjectURL(event.target.files[0]);
                                                        };
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-sm btn-primary" type="submit">
                                            <i class="fa fa-dot-circle-o"></i>Tạo mới</button>
                                        <a class="btn btn-sm btn-danger" href="{{route('admin.product_type.index')}}">
                                            <i class="fa fa-ban"></i>Hủy</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
