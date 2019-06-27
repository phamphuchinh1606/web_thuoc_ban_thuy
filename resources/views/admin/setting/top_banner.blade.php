<?php use App\Common\Constant; ?>

@extends('admin.layouts.master')

@section('head.title','Cài Đặt Top Banner')

@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div class="row">
                <div class="col-sm-12 col-xl-6">
                    <div class="card list-image">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Danh Sách Top Banner
                        </div>
                        <div class="card-body">
                            <div class="carousel slide" data-ride="carousel">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAddImage" aria-expanded="true" aria-controls="collapseExample" data-placement="top" title="" data-original-title="Them Hinh">
                                            <i class="fa fa-upload fa-lg"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-8 collapse" id="collapseAddImage">
                                        <form action="{{route('admin.setting.topBanner.create')}}" method="post"  enctype="multipart/form-data" id="form">
                                            @csrf
                                            <div class="text-right p-sm-1" id="btn_add_image" style="display: none">
                                                <button type="submit" class="btn btn-primary">Thêm hình</button>
                                            </div>
                                            <div class="upload__area-image">
                                                    <span>
                                                        <img id="imgAdd" src="http://beats-city.amagumolabs.io/images/upload/no_image_available.jpg">
                                                        <label for="imageFileAdd">Upload image</label>
                                                    </span>
                                                <p><small>(Please upload a file of type: jpeg, png, jpg, gif, svg. ( width: 395px , height: 198px)</small></p>
                                            </div>
                                            <div class="form__upload">
                                                <div class="form-inline-simple">
                                                    <input type="file" name="src_image" class="form-control imgAnchorInput" id="imageFileAdd" onchange="loadFileImage(event)">
                                                </div>
                                                <script>
                                                    var loadFileImage = function(event) {
                                                        var output = document.getElementById('imgAdd');
                                                        output.src = URL.createObjectURL(event.target.files[0]);
                                                        document.getElementById('btn_add_image').style.display = 'block';
                                                    };
                                                </script>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach($banners as $banner)
                                        <div class="col-md-4">
                                            <img src="{{asset(Constant::$PATH_URL_UPLOAD_IMAGE.$banner->src_image)}}">
                                            <div>
                                                <a data-toggle="modal" class="nav-link delete-image anchorClick" data-url="{{route('admin.setting.topBanner.delete',['id' => $banner->id])}}" data-name="Hình ảnh" href="#deleteModal">
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
                @if(count($banners) > 0)
                    <div class="col-sm-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-align-justify"></i>Hình Ảnh Top Banner
                            </div>
                            <div class="card-body">
                                <div class="carousel slide" id="carouselExampleIndicators" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @foreach($banners as $index => $banner)
                                            <li class="@if($index == 0) active @endif" data-target="#carouselExampleIndicators" data-slide-to="{{$index}}"></li>
                                        @endforeach
                                    </ol>
                                    <div class="carousel-inner">
                                        @foreach($banners as $index => $banner)
                                            <div class="carousel-item @if($index == 0) active @endif">
                                                <img class="d-block w-100" alt="Image Banner" src="{{asset(Constant::$PATH_URL_UPLOAD_IMAGE.$banner->src_image)}}" data-holder-rendered="true">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>

@endsection