<?php use App\Common\Constant; ?>

@extends('admin.layouts.master')

@section('head.title','Cài Đặt Tags Key')

@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div class="row">
                <div class="col-sm-12 col-xl-6">
                    <div class="card list-image">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Danh Sách Tag Key 1
                        </div>
                        <div class="card-body">
                            <div class="carousel slide" data-ride="carousel">
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAddImage" aria-expanded="true" aria-controls="collapseExample" data-placement="top" title="" data-original-title="Them Hinh">
                                            <i class="fa fa-tag fa-lg"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-10 collapse show" id="collapseAddImage">
                                        <form action="{{route('admin.setting.tag.create')}}" method="post"  enctype="multipart/form-data" id="form">
                                            @csrf
                                            <input type="hidden" name="tab_type" value="{{Constant::$TAG_KEY_ONE}}" />
                                            <div class="card">
                                                <div class="card-header">Nhập Thông Tin Tag Key 1
                                                </div>
                                                <div class="card-body">
                                                    <form action="" method="post">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="text-input">Tên Tag</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" id="text-input" type="text" name="tag_name" placeholder="Tên tag">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="text-input">Danh Mục</label>
                                                            <div class="col-md-9">
                                                                @include('admin.common.__select_product_type',['selectName' => 'product_type_id'])
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-actions">
                                                            <button class="btn btn-sm btn-primary pull-right" type="submit">Thêm</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table table-responsive-sm table-striped">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tag Name</th>
                                                <th>Danh Muc</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tagOneList as $index => $tag)
                                                <tr>
                                                    <td>{{$index + 1}}</td>
                                                    <td>{{$tag->tag_name}}</td>
                                                    <td>{{$tag->product_type_name}}</td>
                                                    <td>
                                                        <a data-toggle="modal" class="btn btn-danger anchorClick"
                                                           data-url="{{route('admin.setting.tag.delete',['id' => $tag->id]) }}"
                                                           data-name="{{$tag->tag_name}}" href="#deleteModal">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-xl-6">
                    <div class="card list-image">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Danh Sách Tag Key 2
                        </div>
                        <div class="card-body">
                            <div class="carousel slide" data-ride="carousel">
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAddTag_2" aria-expanded="true" aria-controls="collapseExample" data-placement="top" title="" data-original-title="Them Hinh">
                                            <i class="fa fa-tag fa-lg"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-10 collapse show" id="collapseAddTag_2">
                                        <form action="{{route('admin.setting.tag.create')}}" method="post"  enctype="multipart/form-data" id="form">
                                            @csrf
                                            <input type="hidden" name="tab_type" value="{{Constant::$TAG_KEY_TWO}}" />
                                            <div class="card">
                                                <div class="card-header">Nhập Thông Tin Tag Key 2
                                                </div>
                                                <div class="card-body">
                                                    <form action="" method="post">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="text-input">Tên Tag</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" id="text-input" type="text" name="tag_name" placeholder="Tên tag">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="text-input">Danh Mục</label>
                                                            <div class="col-md-9">
                                                                @include('admin.common.__select_product_type',['selectName' => 'product_type_id'])
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-actions">
                                                            <button class="btn btn-sm btn-primary pull-right" type="submit">Thêm</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table table-responsive-sm table-striped">
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tag Name</th>
                                            <th>Danh Muc</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tagTwoList as $index => $tag)
                                            <tr>
                                                <td>{{$index + 1}}</td>
                                                <td>{{$tag->tag_name}}</td>
                                                <td>{{$tag->product_type_name}}</td>
                                                <td>
                                                    <a data-toggle="modal" class="btn btn-danger anchorClick"
                                                       data-url="{{route('admin.setting.tag.delete',['id' => $tag->id]) }}"
                                                       data-name="{{$tag->tag_name}}" href="#deleteModal">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection