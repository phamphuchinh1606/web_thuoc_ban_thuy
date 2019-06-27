<?php use App\Common\Constant; ?>

@extends('admin.layouts.master')

@section('head.title','Cài Đặt Đối Tác')

@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div class="row">
                <div class="col-sm-12 col-xl-6">
                    <div class="card list-image">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Danh Sách Đối Tác
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
                                        <form action="{{route('admin.manufacture.create')}}" method="post"  enctype="multipart/form-data" id="form">
                                            @csrf
                                            <div class="text-right p-sm-1" id="btn_add_image" style="display: none">
                                                <button type="submit" class="btn btn-primary">Thêm</button>
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
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label" for="text-input">Link url</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" id="text-input" type="text" name="link_url" placeholder="Link url">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label" for="text-input">Thứ tự</label>
                                                <div class="col-md-9">
                                                    <input value="1" class="form-control" id="text-input" type="number" min="1" name="sort_num" placeholder="Thứ tự" required>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach($manufactures as $manufacture)
                                        <div class="col-md-4">
                                            <img src="{{\App\Common\ImageCommon::showImage($manufacture->src_image)}}" style="width: 100%;height: auto;max-width: 200px;max-height: 200px">
                                            <div>
                                                <a data-toggle="modal" class="nav-link delete-image anchorClick" data-url="{{route('admin.manufacture.delete',['id' => $manufacture->id])}}" data-name="Hình ảnh" href="#deleteModal">
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
                @if(count($manufactures) > 0)
                    <div class="col-sm-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-align-justify"></i>Hình Ảnh Top Banner
                            </div>
                            <div class="card-body">
                                <div class="carousel slide" id="carouselExampleIndicators" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @foreach($manufactures as $index => $manufacture)
                                            <li class="@if($index == 0) active @endif" data-target="#carouselExampleIndicators" data-slide-to="{{$index}}"></li>
                                        @endforeach
                                    </ol>
                                    <div class="carousel-inner">
                                        @foreach($manufactures as $index => $manufacture)
                                            <div class="carousel-item @if($index == 0) active @endif">
                                                <img class="d-block w-100" alt="Image Banner" src="{{\App\Common\ImageCommon::showImage($manufacture->src_image)}}" data-holder-rendered="true"
                                                     style="width: 100%;height: auto;max-width: 200px;max-height: 200px">
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