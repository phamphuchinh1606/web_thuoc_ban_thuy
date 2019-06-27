<?php use App\Common\Constant; ?>
<?php use App\Common\AppCommon; ?>
@extends('admin.layouts.master')

@section('head.title','Chi tiết đơn hàng')

@section('head.css')
@endsection

@section('body.js')
@endsection

@section('body.breadcrumb')
    {{ Breadcrumbs::render('admin.order.show') }}
@endsection


@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" action="">
                                @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <i class="icon-note"></i> Chi tiết đơn hàng
                                        <div class="card-header-actions">
                                            <a class="btn btn-sm btn-secondary" href="{{route('admin.order.index')}}">
                                                Quay Lại
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label" for="text-input">Mã đơn hàng</label>
                                                    <div class="col-md-10">
                                                        <p class="form-control-static col-form-label font-weight-bold">{{$order->id}}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label">Tên khách hàng</label>
                                                    <div class="col-md-10">
                                                        <p class="form-control-static col-form-label font-weight-bold">{{$order->full_name}}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label">Số điện thoại</label>
                                                    <div class="col-md-10">
                                                        <p class="form-control-static col-form-label font-weight-bold">{{$order->phone_number}}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label">Địa chỉ</label>
                                                    <div class="col-md-10">
                                                        <p class="form-control-static col-form-label font-weight-bold">{{$order->address}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label">Email</label>
                                                    <div class="col-md-10">
                                                        <p class="form-control-static col-form-label font-weight-bold">{{$order->email}}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label">Ngày đặt hàng</label>
                                                    <div class="col-md-10">
                                                        <p class="form-control-static col-form-label font-weight-bold">{{AppCommon::dateFormat($order->order_date)}}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label">Trạng thái</label>
                                                    <div class="col-md-10">
                                                        <p class="form-control-static col-form-label font-weight-bold badge {{$order->status_class}}">{{$order->status_name}}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label">Tổng tiền</label>
                                                    <div class="col-md-10">
                                                        <p class="form-control-static col-form-label font-weight-bold text-danger">{{AppCommon::formatMoney($order->total_amount)}} ₫</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <i class="icon-note"></i> Danh sách sản phẩm
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-striped table-bordered datatable dataTable no-footer" id="DataTables_Table_0" role="grid"
                                                               aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                                            <thead>
                                                            <tr role="row">
                                                                <th>
                                                                    STT
                                                                </th>
                                                                <th>
                                                                    Mã sản phẩm
                                                                </th>
                                                                <th>
                                                                    Tên sản phẩm
                                                                </th>
                                                                <th>
                                                                    Đơn giá
                                                                </th>
                                                                <th>
                                                                    Số lượng
                                                                </th>
                                                                <th>
                                                                    Thành tiền
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($order->orderDetails as $index => $orderDetail)
                                                                <tr>
                                                                    <td>
                                                                        {{$index + 1}}
                                                                    </td>
                                                                    <td>
                                                                        {{$orderDetail->product_id}}
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{route('admin.product.update',['id' => $orderDetail->product_id])}}" target="_blank">
                                                                            {{$orderDetail->product_name}}
                                                                        </a>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        {{AppCommon::formatMoney($orderDetail->product_price)}}₫
                                                                    </td>
                                                                    <td class="text-right">
                                                                        {{$orderDetail->product_qty}}
                                                                    </td>
                                                                    <td class="text-right">
                                                                        {{AppCommon::formatMoney($orderDetail->total_money)}}₫
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
                                    <div class="card-footer text-center">
                                        @if($isShowConfirm)
                                            <a data-toggle="modal" class="btn btn-sm btn-primary p-2 primaryPopupClick"
                                               data-url="{{route('admin.order.detail.confirm',['id' => $order->id])}}"
                                               data-title="Xác nhận đơn hàng"
                                               data-content="Bạn có thực sự muốn xác nhận đơn hàng cho <b>{{$order->full_name}}</b>"
                                               data-name="{{$order->full_name}}" data-target="#primaryModal" href="#primaryModal"
                                               data-name-cancel="Không" data-name-ok="Xác nhận">
                                                Xác nhận đơn hàng
                                            </a>
                                        @endif

                                        @if($isShowShipping)
                                            <a data-toggle="modal" class="btn btn-sm btn-warning p-2 warningPopupClick"
                                               data-url="{{route('admin.order.detail.shipping',['id' => $order->id])}}"
                                               data-title="Vận chuyển đơn hàng"
                                               data-content="Bạn có thực sự muốn chuyển hàng cho <b>{{$order->full_name}}</b>"
                                               data-name="{{$order->full_name}}" data-target="#warningModal" href="#warningModal"
                                               data-name-cancel="Không" data-name-ok="Chuyển hàng">
                                                Đang giao hàng
                                            </a>
                                        @endif

                                        @if($isShowFinish)
                                            <a data-toggle="modal" class="btn btn-sm btn-success p-2 successPopupClick"
                                               data-url="{{route('admin.order.detail.finish',['id' => $order->id])}}"
                                               data-title="Hoàn thành kết thúc đơn hàng"
                                               data-content="Bạn có thực sự muốn hoàn thành đơn hàng cho <b>{{$order->full_name}}</b>"
                                               data-name="{{$order->full_name}}" data-target="#successModal" href="#successModal"
                                               data-name-cancel="Không" data-name-ok="Hoàn thành">
                                                Hoàn thành đơn hàng
                                            </a>
                                        @endif

                                        @if($isShowCancel)
                                            <a data-toggle="modal" class="btn btn-sm btn-danger p-2 dangerPopupClick"
                                               data-url="{{route('admin.order.detail.cancel',['id' => $order->id])}}"
                                               data-title="Xác nhận hủy đơn hàng"
                                               data-content="Bạn có thực sự muốn hủy đơn hàng của <b>{{$order->full_name}}</b>"
                                               data-name="{{$order->full_name}}" data-target="#dangerModal" href="#dangerModal"
                                               data-name-cancel="Không" data-name-ok="Hủy đơn hàng">
                                                <i class="fa fa-ban"></i> Hủy đơn hàng</button>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('body.popup')
    @include('admin.common.__popup_primary_modal')
    @include('admin.common.__popup_warning_modal')
    @include('admin.common.__popup_success_modal')
    @include('admin.common.__popup_danger_modal')
@endsection
