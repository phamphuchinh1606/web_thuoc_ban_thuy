@extends('admin.layouts.master')

@section('head.css')
@endsection

@section('body.js')
@endsection

@section('body.breadcrumb')
    {{ Breadcrumbs::render('admin.contact.show') }}
@endsection

@section('body.content')
    <div class="container-fluid product_type">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Thông tin liên hệ của khách hàng</strong>
                                    <div class="card-header-actions">
                                        <a class="btn btn-block btn-outline-secondary active" href="{{route('admin.contact.index')}}">
                                            Quay Lại
                                        </a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <lable class="col-md-2">
                                            <i class="fa fa-user"></i>
                                            Tên khách hàng
                                        </lable>
                                        <div class="col-md-10">
                                            <p class="form-control-static font-weight-bold">
                                                {{$contact->guest_name}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <lable class="col-md-2">
                                            <i class="fa fa-user"></i>
                                            Số điện thoại
                                        </lable>
                                        <div class="col-md-10">
                                            <p class="form-control-static font-weight-bold">
                                                {{$contact->guest_phone}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <lable class="col-md-2">
                                            <i class="fa fa-envelope"></i>
                                            Địa chỉ email
                                        </lable>
                                        <div class="col-md-10">
                                            <p class="form-control-static font-weight-bold">
                                                {{$contact->guest_email}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <lable class="col-md-2">
                                            <i class="fa fa-inbox" aria-hidden="true"></i>
                                            Nội dung liên hệ
                                        </lable>
                                        <div class="col-md-10">
                                            <p class="form-control-static font-weight-bold">
                                                {{$contact->guest_content}}
                                            </p>
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
