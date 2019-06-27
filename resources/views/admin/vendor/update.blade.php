@extends('admin.layouts.master')

@section('head.title','Cập Nhật Thương Hiệu')

@section('head.css')@endsection

@section('body.js')
    {{--<script src="{{asset('js/admin/switch.plugin.js')}}"></script>--}}
@endsection
@section('body.breadcrumb')
    {{ Breadcrumbs::render('admin.vendor.edit',$vendor->vendor_name) }}
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
                                <form class="form-horizontal" action="{{route('admin.vendor.update',['id' => $vendor->id])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label" for="text-input">Tên Thương Hiệu</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="text-input" type="text" name="vendor_name" placeholder="Tên Thương Hiệu" required
                                                    value="{{$vendor->vendor_name}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-sm btn-primary" type="submit">
                                            <i class="fa fa-dot-circle-o"></i>Cập Nhật</button>
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
