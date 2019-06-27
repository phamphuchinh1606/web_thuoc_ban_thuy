<div class="sidebar">
    <nav class="sidebar-nav ps ps--active-y">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.home')}}">
                    <i class="nav-icon icon-speedometer"></i> Trang chủ
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.product.index')}}">
                    <i class="nav-icon icon-layers"></i>
                    Sản phẩm
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.equipment.index')}}">
                    <i class="nav-icon icon-screen-smartphone"></i>
                    Thiết Bị
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.design.index')}}">
                    <i class="nav-icon icon-disc"></i>
                    Thiết Kế
                </a>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-grid"></i>Danh Mục</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.product_type.index')}}">
                            <i class="nav-icon icon-menu"></i>
                            Danh mục sản phẩm
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.equipment_type.index')}}">
                            <i class="nav-icon icon-direction"></i>
                            Loại thiết bị
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.design_type.index')}}">
                            <i class="nav-icon icon-screen-desktop"></i>
                            Loại thiết kế
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-settings"></i>Cài Đặt</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.setting.banner')}}">
                            <i class="nav-icon icon-picture"></i>
                            Banner Slider
                        </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{route('admin.setting.topBanner')}}">--}}
{{--                            <i class="nav-icon icon-map"></i>--}}
{{--                            Top Banner--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{route('admin.setting.tag')}}">--}}
{{--                            <i class="nav-icon icon-tag"></i>--}}
{{--                            Tags Key--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.setting.app')}}">
                            <i class="nav-icon icon-note"></i>
                            App Info
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.setting.app_about.show')}}">
                            <i class="nav-icon icon-wallet"></i>
                            Thông tin giới thiệu
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.blog.index')}}">
                    <i class="nav-icon icon-calendar"></i>
                    Tin Tức
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.contact.index')}}">
                    <i class="nav-icon icon-envelope-open"></i>
                    Liên Hệ
{{--                    <span class="badge badge-danger">{{$countContact}}</span>--}}
                </a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="{{route('admin.order.index')}}">--}}
{{--                    <i class="nav-icon icon-basket"></i>--}}
{{--                    Đơn hàng--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 708px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 422px;"></div>
        </div>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
