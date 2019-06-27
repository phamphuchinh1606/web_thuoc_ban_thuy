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
                                        <p></p><p>Văn phòng &amp; Nhà xưởng :&nbsp;26 Đường số 2 Vạn Phúc City, QL. 13, Hiệp Bình Phước, Q. Thủ Đức, TP. Hồ Chí Minh</p>

                                        <p>Hotline : <span style="font-family: arial, helvetica, sans-serif;">0907 130 484 - 0938957362</span><br>
                                            Email&nbsp; &nbsp;: kynghetoanthang@gmail.com</p>
                                        <p></p>
                                    </div>
                                    <div class="row">
                                        <div class="khung_phai col-md-6 col-sm-12 col-xs-12">
                                            <div style="padding-bottom:50%;position:relative;width:100%;height: 0"><div id="map_canvas" data-coor="" data-zoom="14" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;"></div></div>		      	</div>

                                        <div class="khung_trai col-md-6 col-sm-12 col-xs-12">

                                            <div class="row form_lh">
                                                <form method="post" name="frm" action="lien-he.html" enctype="multipart/form-data">
                                                    <!-- <div class="row"> -->
                                                    <div class="left-form col-md-5 col-sm-5 col-xs-12">
                                                        <p class="line-input ften">
                                                            <input name="ten" type="text" class="tflienhe" id="ten" placeholder="Họ và tên">
                                                        </p>
                                                        <p class="line-input fdiachi">
                                                            <input name="diachi" type="text" class="tflienhe" id="diachi" placeholder="Địa Chỉ ">
                                                        </p>
                                                        <p class="line-input fdienthoai">
                                                            <input name="dienthoai" type="text" class="tflienhe" id="dienthoai" placeholder="Điện Thoại ">
                                                        </p>
                                                        <p class="line-input femail">
                                                            <input name="email" type="text" class="tflienhe" id="email" placeholder="Email">
                                                        </p>
                                                        <p class="line-input ftieude">
                                                            <input name="tieude" type="text" class="tflienhe" id="tieude" placeholder="Chủ đề">
                                                        </p>
                                                    </div>
                                                    <div class="right-form col-md-7 col-sm-7 col-xs-12">
                                                        <p class="line-input fnoidung">
                                                            <textarea name="noidung" cols="50" rows="5" class="ta_noidung" id="noidung" placeholder="Nội dung"></textarea>
                                                        </p>
                                                        <div class="clear"></div>
                                                        <p class="line-input input-button">
                                                            <button type="button" class="button-contact btn btn-primary" onclick="js_submit12();"> Gửi liên hệ</button>
                                                            <button type="reset" class="button-contact btn btn-danger">Reset</button>
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