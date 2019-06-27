<?php use App\Common\Constant; ?>
@extends('admin.layouts.master')
@section('head.title','Cập nhật loại thiết bị')
@section('head.css')
    <link href="{{asset('css/admin/product.css')}}" rel="stylesheet">
@endsection

@section('body.js')@endsection
@section('body.breadcrumb')
    {{ Breadcrumbs::render('admin.equipmentType.edit', $equipmentType->equipment_type_name) }}
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
                                    <strong>Cập Nhật Loại Thiết Bị</strong>
                                    <div class="card-header-actions">
                                        <a class="btn btn-sm btn-secondary" href="{{route('admin.equipment_type.index')}}">
                                            Quay Lại
                                        </a>
                                    </div>
                                </div>
                                <form class="form-horizontal" action="{{route('admin.equipment_type.update',['id' => $equipmentType->id])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Tên Loại Thiết Bị </label>
                                            <div class="col-md-10">
                                                <input class="form-control" id="text-input" type="text" name="equipment_type_name" required
                                                    value="{{$equipmentType->equipment_type_name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-lable" for="">Công Khai</label>
                                            <div class="col-md-10">
                                                <label class="switch switch-label switch-outline-primary-alt">
                                                    <input class="switch-input" type="checkbox" {{$equipmentType->is_check_public}} name="is_public">
                                                    <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                                                </label>
                                            </div>
                                        </div>
{{--                                        <div class="form-group row">--}}
{{--                                            <label class="col-md-2 col-form-lable" for="">Icon Image</label>--}}
{{--                                            <div class="col-md-3">--}}
{{--                                                <div class="upload__area-image">--}}
{{--                                                <span>--}}
{{--                                                    <img id="imgAdd" src="{{asset(Constant::$PATH_URL_UPLOAD_IMAGE.$equipmentType->image_icon)}}">--}}
{{--                                                    <label for="imageFileAdd">Upload image</label>--}}
{{--                                                </span>--}}
{{--                                                    <p><small>( width: 20px , height: 20px)</small></p>--}}
{{--                                                </div>--}}
{{--                                                <div class="form__upload image_icon">--}}
{{--                                                    <div class="form-inline-simple">--}}
{{--                                                        <input type="file" name="image_icon" class="form-control imgAnchorInput" id="imageFileAdd" onchange="loadFileImage(event)">--}}
{{--                                                    </div>--}}
{{--                                                    <script>--}}
{{--                                                        var loadFileImage = function(event) {--}}
{{--                                                            var output = document.getElementById('imgAdd');--}}
{{--                                                            output.src = URL.createObjectURL(event.target.files[0]);--}}
{{--                                                        };--}}
{{--                                                    </script>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-sm btn-primary" type="submit">
                                            <i class="fa fa-dot-circle-o"></i>Cập Nhật</button>
                                        <button class="btn btn-sm btn-danger" type="reset">
                                            <i class="fa fa-ban"></i>&nbspHủy&nbsp</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
{{--                            <form class="form-horizontal" action="{{route('admin.equipment_type.create_children',['id' => $equipmentType->id])}}" method="post" enctype="multipart/form-data">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-header">--}}
{{--                                        <strong>Tạo Danh Mục Con</strong>--}}
{{--                                        <div class="card-header-actions">--}}
{{--                                            <button class="btn btn-sm btn-primary" type="submit">--}}
{{--                                                Thêm--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    @csrf--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div class="form-group row">--}}
{{--                                            <label class="col-md-2 col-form-label" for="text-input">Tên Danh Mục </label>--}}
{{--                                            <div class="col-md-10">--}}
{{--                                                <input class="form-control" id="text-input" type="text" name="equipment_type_name" required>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group row">--}}
{{--                                            <label class="col-md-2 col-form-lable" for="">Công Khai</label>--}}
{{--                                            <div class="col-md-10">--}}
{{--                                                <label class="switch switch-label switch-outline-primary-alt">--}}
{{--                                                    <input class="switch-input" type="checkbox" checked name="is_public">--}}
{{--                                                    <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="card-header">--}}
{{--                                        <strong>Danh Sách Danh Mục Con</strong>--}}
{{--                                    </div>--}}
{{--                                    <div class="card-body">--}}
{{--                                        <table class="table table-responsive-sm table-bordered">--}}
{{--                                            <thead>--}}
{{--                                            <tr>--}}
{{--                                                <th>Tên Danh Mục</th>--}}
{{--                                                <th>Tình Trạng</th>--}}
{{--                                                <th>Action</th>--}}
{{--                                            </tr>--}}
{{--                                            </thead>--}}
{{--                                            <tbody>--}}
{{--                                                @foreach($listChildren as $equipmentTypeChild)--}}
{{--                                                    <tr>--}}
{{--                                                        <td>{{$equipmentTypeChild->equipment_type_name}}</td>--}}
{{--                                                        <td>--}}
{{--                                                            <span class="badge {{$equipmentTypeChild->public_class}}">{{$equipmentTypeChild->public_name}}</span>--}}
{{--                                                        </td>--}}
{{--                                                        <td>--}}
{{--                                                            <a data-toggle="modal" class="btn btn-danger anchorClick"--}}
{{--                                                                data-url="{{route('admin.equipment_type.delete_children',['id' => $equipmentType->id, 'childId' => $equipmentTypeChild->id])}}"--}}
{{--                                                                data-name="{{$equipmentTypeChild->equipment_type_name}}" href="#deleteModal">--}}
{{--                                                                <i class="fa fa-trash-o"></i>--}}
{{--                                                            </a>--}}
{{--                                                        </td>--}}
{{--                                                    </tr>--}}
{{--                                                @endforeach--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
