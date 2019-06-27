<nav id="nav-rp" class="invi_loading">
    <ul>
        <li class="icon-home active"><a href="">Trang chủ</a></li>

        <li>
            <a href="{{route('about')}}" class="font_custom ">Giới thiệu</a>
        </li>

        <li><a href="{{route('collection')}}"  class="font_custom  border-none">Sản phẩm</a>
            <ul>
                <li><a href="{{route('collection')}}">Thang Tải Khách</a>
                </li>
                <li><a href="{{route('collection')}}">Thang Quan Sát</a>
                </li>
                <li><a href="{{route('collection')}}">Thang Gia Đình</a>
                </li>
                <li><a href="{{route('collection')}}">Thang Bệnh Viện</a>
                </li>
                <li><a href="{{route('collection')}}">Thang Tải Ô tô</a>
                </li>
                <li><a href="{{route('collection')}}">Thang Tải Hàng</a>
                </li>
                <li><a href="{{route('collection')}}">Thang Tải Thực Phẩm</a>
                </li>
                <li><a href="{{route('collection')}}">Thang Nhập Khẩu</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{route('collection')}}">Thiết bị</a>
            <ul>
                <li><a href="{{route('collection')}}">Thiết bị cơ</a></li>
                <li><a href="{{route('collection')}}">Thiết bị điện</a></li>
                <li><a href="{{route('collection')}}">Máy kéo</a></li>
            </ul>
        </li>
        <li>
            <a href="{{route('collection')}}">Thiết trí</a>
            <ul>
                <li><a href="{{route('collection')}}">Kiểu cửa</a></li>
                <li><a href="{{route('collection')}}">Kiểu khung cửa</a></li>
                <li><a href="{{route('collection')}}">Kiểu trần phòng thang</a></li>
                <li><a href="{{route('collection')}}">Sàn phòng thang</a></li>
                <li><a href="{{route('collection')}}">Tay vịn</a></li>
                <li><a href="{{route('collection')}}">Bảng điều khiển</a></li>
                <li><a href="{{route('collection')}}">Kiểu hoa văn trang trí</a></li>
            </ul>
        </li>
        <li><a href="{{route('out_source')}}"  class="font_custom  border-none">Gia công cơ khí</a></li>
        <li><a href="{{route('blogs')}}"  class="font_custom  border-none">Tin tức</a></li>
        <!-- <li><a href="tin-tuc.html"  class="font_custom  border-none">Tin tức</a></li>    -->
        <li><a href="{{route('contact')}}"  class="font_custom  border-none">Liên hệ</a></li>
    </ul>
</nav>
<script>
    $(document).ready(function() {
        $("#menu").removeClass('invi_loading');
    });
</script>