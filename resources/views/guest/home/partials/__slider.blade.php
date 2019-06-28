<div class="block-slider">
    <div class="owl-carousel owl-theme owl-slider" data-slider-id="1">
        @foreach($banners as $banner)
            <div class="item">
                <a href="" target="blank"><img src="{{\App\Common\ImageCommon::showImage($banner->src_image)}}" alt="hệ thống"></a>
            </div>
        @endforeach

    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('.frm_timkiem').submit(function(){
            var timkiem = $('#keyword').val();
            if(!timkiem){
                alert('Bạn chưa nhập từ khóa . ');
            } else {
                window.location.href="tim-kiem.html&keywords="+timkiem;
            }
            return false;
        })
    });
</script>