<?php
    use App\Common\ImageCommon;
    use App\Common\Constant;
?>

@extends('admin.layouts.master')

@section('head.title','Cài Đặt Slider Banner')

@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div class="row">
                <div class="col-sm-12 col-xl-6">
                    <div class="card list-image">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Danh Sách Ảnh Banner
                        </div>
                        <div class="card-body">
                            <div class="carousel slide" data-ride="carousel">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <button class="btn btn-primary show-add-update-image" type="button" data-toggle="collapse" data-target="#collapseAddImage" aria-expanded="true" aria-controls="collapseExample" data-placement="top" title="" data-original-title="Them Hinh">
                                            <i class="fa fa-upload fa-lg"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-8 collapse" id="collapseAddImage">
                                        <form action="{{route('admin.setting.banner.create')}}" method="post"  enctype="multipart/form-data" id="formBanner">
                                            @csrf
                                            <input type="hidden" id="banner_id" name="banner_id" value=""/>
                                            <div class="text-right p-sm-1" id="btn_add_image" style="display: none">
                                                <button type="submit" id="btn-create" class="btn btn-primary">Thêm Hình</button>
                                            </div>
                                            <div class="text-right p-sm-1" id="btn_update_image" style="display: none">
                                                <button type="button" id="btn-cancel" class="btn btn-danger">Hủy</button>
                                                <button type="submit" id="btn-update" class="btn btn-primary">Cập Nhật</button>
                                            </div>
                                            <div class="upload__area-image">
                                                    <span>
                                                        <img id="imgAdd" src="http://beats-city.amagumolabs.io/images/upload/no_image_available.jpg">
                                                        <label for="imageFileAdd">Upload image</label>
                                                    </span>
                                                <p><small>(Please upload a file of type: jpeg, png, jpg, gif, svg. ( width: 893px , height: 465px)</small></p>
                                            </div>
                                            <div class="form__upload">
                                                <div class="form-inline-simple">
                                                    <input type="file" name="src_image" class="form-control imgAnchorInput" id="imageFileAdd" onchange="loadFileImage(event)">
                                                </div>
                                                <script>
                                                    var loadFileImage = function(event) {
                                                        var output = document.getElementById('imgAdd');
                                                        output.src = URL.createObjectURL(event.target.files[0]);
                                                        if(document.getElementById('banner_id').getAttribute('value') == ''){
                                                            document.getElementById('btn_add_image').style.display = 'block';
                                                        }
                                                    };
                                                </script>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label" for="text-input">Link url</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" id="text-input" type="text" name="link_url" placeholder="Link url" required>
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
                                    @foreach($banners as $banner)
                                        <div class="col-md-4">
                                            <img src="{{\App\Common\ImageCommon::showImage($banner->src_image)}}">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a data-toggle="modal" class="nav-link delete-image anchorClick" data-url="{{route('admin.setting.banner.delete',['id' => $banner->id])}}" data-name="Hình ảnh" href="#deleteModal">
                                                        Xóa Ảnh
                                                    </a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="#" data-toggle="modal" class="nav-link update-image"  data-name="Hình ảnh">
                                                        Cập Nhật
                                                    </a>
                                                    <input type="hidden" name="banner_id" value="{{$banner->id}}"/>
                                                    <input type="hidden" name="action_update" value="{{route('admin.setting.banner.update',['id' => $banner->id])}}"/>
                                                    <input type="hidden" name="src_image" value="{{\App\Common\ImageCommon::showImage($banner->src_image)}}"/>
                                                    <input type="hidden" name="link_url" value="{{$banner->link_url}}"/>
                                                    <input type="hidden" name="sort_num" value="{{$banner->sort_num}}"/>
                                                </div>
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
                                <i class="fa fa-align-justify"></i>Hình Ảnh Banner
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

    <script>
        $(document).ready(function(){
            $('a.update-image').on('click',function(){
                let parent = $(this).closest('div');
                let bannerId = parent.find('input[name=banner_id]').val();
                let srcImage = parent.find('input[name=src_image]').val();
                let linkUrl = parent.find('input[name=link_url]').val();
                let sortNum = parent.find('input[name=sort_num]').val();
                let form = $('#formBanner');
                form.find('input[name=banner_id]').val(bannerId);
                form.find('#imgAdd').attr('src',srcImage);
                form.find('input[name=link_url]').val(linkUrl);
                form.find('input[name=sort_num]').val(sortNum);
                form.attr('action',parent.find('input[name=action_update]').val());

                $('#btn_update_image').show();
                $('#btn_add_image').hide();
                if($( "#formBanner" ).is( ":hidden" )){
                    $('.show-add-update-image').click();
                }
            });

            $('button#btn-cancel').on('click',function(){
                let form = $('#formBanner');
                form.find('input[name=banner_id]').val('');
                form.find('#imgAdd').attr('src','http://beats-city.amagumolabs.io/images/upload/no_image_available.jpg');
                form.find('input[name=link_url]').val('');
                form.find('input[name=sort_num]').val('');
                form.attr('action','{{route('admin.setting.topBanner.create')}}');
                $('#btn_update_image').hide();
                $('#btn_add_image').show();
                if($( "#formBanner" ).is( ":visible" )){
                    $('.show-add-update-image').click();
                }
            });
        })
    </script>

@endsection