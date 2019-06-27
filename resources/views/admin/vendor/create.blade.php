@extends('admin.layouts.master')

@section('head.title','Tạo Mới Thương Hiệu')

@section('head.css')@endsection

@section('body.js')
    {{--<script src="{{asset('js/admin/switch.plugin.js')}}"></script>--}}
@endsection
@section('body.breadcrumb')
    {{ Breadcrumbs::render('admin.productType.create') }}
@endsection
@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Tạo Mới Thương Hiệu</strong>
                                    <div class="card-header-actions">
                                        <a class="btn btn-block btn-outline-secondary active" href="{{route('admin.vendor.index')}}">
                                            Quay Lại
                                        </a>
                                    </div>
                                </div>
                                <form class="form-horizontal" action="{{route('admin.vendor.create')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="text-input">Tên Thương Hiệu</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="text-input" type="text" name="vendor_name" placeholder="Tên Thương Hiệu" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-sm btn-primary" type="submit">
                                            <i class="fa fa-dot-circle-o"></i>Tạo mới</button>
                                        <a class="btn btn-sm btn-danger" href="{{route('admin.vendor.index')}}">
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
