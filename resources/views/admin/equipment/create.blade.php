@extends('admin.layouts.master')

@section('head.title','Tạo mới thiết bị')

@section('head.css')
    <link href="{{asset('css/admin/plugins/quill.snow.css')}}" rel="stylesheet">
    {{--<link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{asset('css/admin/plugins/dropzone.css')}}">
    <link href="{{asset('css/admin/dropzon_custom.css')}}" rel="stylesheet">
@endsection

@section('body.js')
    <script src="{{asset('js/admin/plugins/quill.min.js')}}"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.min.js"></script>--}}
    <script src="{{asset('js/admin/plugins/text-editor.js')}}"></script>
    <script src="{{asset('js/admin/plugins/dropzone.js')}}"></script>
    <script src="{{asset('js/admin/dropzone-config.js')}}"></script>
    <script src="{{asset('js/admin/product.js')}}"></script>
@endsection

@section('body.breadcrumb')
    {{ Breadcrumbs::render('admin.equipment.create') }}
@endsection

@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-8">
                            <form method="post" action="{{route('admin.equipment.create')}}" enctype="multipart/form-data" id="form">
                                @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <i class="icon-note"></i> Tạo Mới thiết bị
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Tên thiết bị</label>
                                            <div class="col-md-10">
                                                <input class="form-control" id="text-input" type="text" name="product_name" placeholder="Tên thiết bị" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Mã thiết bị</label>
                                            <div class="col-md-10">
                                                <input class="form-control" id="text-input" type="text" name="product_code" placeholder="Mã thiết bị" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Loại Thiết Bị</label>
                                            <div class="col-md-10">
                                                @include('admin.common.__select_equipment_type',['selectName' => 'equipment_type_id'])
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
                                                <textarea class="form-control" name="product_description" rows="9" placeholder="Nhập mô tả ngắn thông tin thiết bị"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="text-input">Nội dung thiết bị</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <textarea class="form-control" id="summary-ckeditor" name="product_content" style="height: 400px"></textarea>
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
                                            <i class="fa fa-dot-circle-o"></i> Tạo mới</button>
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
                                                        document.getElementById('product_main_image').files = event.target.files;
                                                    };
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> Danh sách hình ảnh phụ
                                    <small>slides only</small>
                                </div>
                                <div class="card-body">
                                    <div class="carousel slide" id="carouselExampleSlidesOnly" data-ride="carousel">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <form method="post" action="{{route('admin.common.upload_image')}}"
                                                      enctype="multipart/form-data" class="dropzone" id="my-dropzone">
                                                    {{ csrf_field() }}
                                                    <div class="dz-message">
                                                        <div class="col-xs-8">
                                                            <div class="message">
                                                                <p>Kéo thả file image hoặc click để upload</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="fallback">
                                                        <input type="file" name="file">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        {{--Dropzone Preview Template--}}
                                        <div id="preview" style="display: none;">

                                            <div class="dz-preview dz-file-preview">
                                                <div class="dz-image"><img data-dz-thumbnail /></div>

                                                <div class="dz-details">
                                                    <div class="dz-size"><span data-dz-size></span></div>
                                                    <div class="dz-filename"><span data-dz-name></span></div>
                                                </div>
                                                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                                                <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                                <div class="dz-success-mark">-}}

                                                </div>
                                                <div class="dz-error-mark">
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
    </div>

@endsection
