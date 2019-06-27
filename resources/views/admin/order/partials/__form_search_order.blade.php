<?php use \App\Common\Constant; ?>

<form action="{{route('admin.order.index')}}" method="get">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-search"></i> Thông tin tìm kiếm đơn hàng
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Mã đơn hàng</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-asterisk"></i>
                                    </span>
                                </div>
                                <input value="{{$searchForm['order_code']}}" class="form-control" id="order_code" type="text" name="order_code">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tên khách hàng</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-male"></i>
                                    </span>
                                </span>
                                <input value="{{$searchForm['full_name']}}" class="form-control" id="full_name" type="text" name="full_name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Số điện thoại</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                </span>
                                <input value="{{$searchForm['phone_number']}}" class="form-control" id="phone_number" name="phone_number" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope-o"></i>
                                    </span>
                                </div>
                                <input value="{{$searchForm['email']}}" class="form-control" id="email" type="email" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Ngày đặt hàng</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>
                                <input value="{{$searchForm['order_date']}}" class="form-control daterange" name="order_date" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Trạng thái</label>
                        <div class="col-md-9">
                            <select class="form-control" id="order_status" name="order_status">
                                <option value="">Chọn trạng thái</option>
                                <option class="font-weight-bold" value="{{Constant::$ORDER_STATUS_NEW_CODE}}">{{Constant::$ORDER_STATUS_NEW_NAME}}</option>
                                <option class="text-primary" value="{{Constant::$ORDER_STATUS_CONFIRM_CODE}}">{{Constant::$ORDER_STATUS_CONFIRM_NAME}}</option>
                                <option class="text-warning" value="{{Constant::$ORDER_STATUS_SHIPPING_CODE}}">{{Constant::$ORDER_STATUS_SHIPPING_NAME}}</option>
                                <option class="text-success" value="{{Constant::$ORDER_STATUS_FINISH_CODE}}">{{Constant::$ORDER_STATUS_FINISH_NAME}}</option>
                                <option class="text-danger" value="{{Constant::$ORDER_STATUS_CANCEL_CODE}}">{{Constant::$ORDER_STATUS_CANCEL_NAME}}</option>
                            </select>
                            <script>
                                $(document).ready(function(){
                                    $('select[name=order_status]').val({{$searchForm['order_status']}});
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <button class="btn btn-sm btn-primary p-2">
                <i class="fa fa-search"></i> Tìm kiếm
            </button>
        </div>
    </div>
</form>
