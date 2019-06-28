<nav id="nav-rp" class="invi_loading">
    <ul>
        <li class="icon-home active"><a href="">Trang chủ</a></li>

        <li>
            <a href="{{route('about')}}" class="font_custom ">Giới thiệu</a>
        </li>

        <li>
            <a href="{{route('collection_all')}}"  class="font_custom  border-none">Sản phẩm</a>
            <ul>
                @foreach($productTypes as $productType)
                    <li>
                        <a href="{{route('collection',['slug' => $productType->slug])}}">{{$productType->product_type_name}}</a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li>
            <a href="{{route('collection_equipment_all')}}">Thiết bị</a>
            <ul>
                @foreach($equipmentTypes as $equipmentType)
                    <li>
                        <a href="{{route('collection_equipment',['slug' => $equipmentType->slug])}}">{{$equipmentType->equipment_type_name}}</a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li>
            <a href="{{route('collection_design_all')}}">Thiết trí</a>
            <ul>
                @foreach($designTypes as $designType)
                    <li>
                        <a href="{{route('collection_design',['slug' => $designType->slug])}}">{{$designType->design_type_name}}</a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li><a href="{{route('out_source')}}"  class="font_custom  border-none">Gia công cơ khí</a></li>
        <li><a href="{{route('blog')}}"  class="font_custom  border-none">Tin tức</a></li>
        <!-- <li><a href="tin-tuc.html"  class="font_custom  border-none">Tin tức</a></li>    -->
        <li><a href="{{route('contact')}}"  class="font_custom  border-none">Liên hệ</a></li>
    </ul>
</nav>
<script>
    $(document).ready(function() {
        $("#menu").removeClass('invi_loading');
    });
</script>