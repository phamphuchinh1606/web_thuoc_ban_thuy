@extends('guest.layouts.master')

@section('body.content')
    <div id="wrapper">
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="left-content col-md-3 col-sm-3 col-xs-12 pull-left mt-20">
                        @include('guest.common.__left_product_type_list')
                    </div>

                    <div class="left-content col-md-9 col-sm-9 col-xs-12 pull-right mt-20">
                        <div id="info">
                            <div id="sanpham">

                                <div class="khung">
                                    <!-- <div class="main-title"><span class="t-transf">Liên hệ</span></div> -->
                                    <div class="form_contact">
                                        <p></p>
                                        <p>Văn phòng &amp; Nhà :&nbsp;{{$appInfo->app_address}}</p>

                                        <p>
                                            Hotline : <span
                                                    style="font-family: arial, helvetica, sans-serif;">{{$appInfo->app_fax}}</span><br>
                                            Điện Thoại : <span
                                                    style="font-family: arial, helvetica, sans-serif;">{{$appInfo->app_phone}}</span><br>
                                            Email&nbsp; &nbsp;: {{$appInfo->app_email}}</p>
                                        <p></p>
                                    </div>
                                    <div class="row">
                                        <div class="khung_phai col-md-6 col-sm-12 col-xs-12">
                                            <div style="padding-bottom:50%;position:relative;width:100%;height: 0">
                                                <div id="map_canvas" data-coor="" data-zoom="14"
                                                     style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;"></div>
                                            </div>
                                        </div>

                                        <div class="khung_trai col-md-6 col-sm-12 col-xs-12">
                                            @if(\Session::has('message'))
                                                <div class="alert alert-success"> {{ \Session::get('message') }}</div>
                                            @endif
                                            <div class="row form_lh">
                                                <form method="post" name="frm" action="{{route('contact.send_contact')}}"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    <!-- <div class="row"> -->
                                                    <div class="left-form col-md-5 col-sm-5 col-xs-12">
                                                        <p class="line-input ften">
                                                            <input name="guest_name" type="text" class="tflienhe" id="ten"
                                                                   placeholder="Họ và tên" required>
                                                        </p>
                                                        <p class="line-input fdiachi">
                                                            <input name="guest_address" type="text" class="tflienhe"
                                                                   id="diachi" placeholder="Địa Chỉ " required>
                                                        </p>
                                                        <p class="line-input fdienthoai">
                                                            <input name="guest_phone" type="text" class="tflienhe"
                                                                   id="dienthoai" placeholder="Điện Thoại " required>
                                                        </p>
                                                        <p class="line-input femail">
                                                            <input name="guest_email" type="text" class="tflienhe" id="email"
                                                                   placeholder="Email" required>
                                                        </p>
                                                        <p class="line-input ftieude">
                                                            <input name="guest_title" type="text" class="tflienhe"
                                                                   id="tieude" placeholder="Chủ đề" required>
                                                        </p>
                                                    </div>
                                                    <div class="right-form col-md-7 col-sm-7 col-xs-12">
                                                        <p class="line-input fnoidung">
                                                            <textarea name="guest_content" cols="50" rows="5"
                                                                      class="ta_noidung" id="noidung"
                                                                      placeholder="Nội dung" required></textarea>
                                                        </p>
                                                        <div class="clear"></div>
                                                        <p class="line-input input-button">
                                                            <button type="submit" class="button-contact btn btn-primary"
                                                                    > Gửi liên hệ
                                                            </button>
                                                            <button type="reset" class="button-contact btn btn-danger">
                                                                Reset
                                                            </button>
                                                        </p>
                                                    </div>
                                                    <div class="clear"></div>
                                                    <!-- </div>	 -->
                                                </form>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
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