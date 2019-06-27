<?php use App\Common\Constant; ?>

@extends('admin.layouts.master')

@section('head.title','Thông tin giới thiệu')

@section('head.css')
    <link href="{{asset('css/admin/plugins/quill.snow.css')}}" rel="stylesheet">
@endsection

@section('body.js')
    <script src="{{asset('js/admin/plugins/quill.min.js')}}"></script>
    <script src="{{asset('js/admin/plugins/text-editor.js')}}"></script>
@endsection

@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('admin.setting.app_about')}}" method="post" enctype="multipart/form-data"
                          id="form">
                        @csrf
                        <input type="hidden" value="{{$appInfo->id}}" name="app_id"/>
                        <div class="card list-image">
                            <div class="card-header">
                                <i class="fa fa-align-justify"></i>Thông tin giới thiệu trang
                            </div>
                            <div class="card-body">
                                <textarea class="form-control" id="summary-ckeditor" name="about_content" style="height: 400px">{{$appInfo->about_content}}</textarea>
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
                            <div class="card-footer">
                                <button class="btn btn-sm btn-primary pull-right" type="submit">
                                    <i class="fa fa-dot-circle-o"></i> Cập Nhật
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
