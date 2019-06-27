<div class="block-slider">
    <div class="owl-carousel owl-theme owl-slider" data-slider-id="1">

        <div class="item">
            <a href="" target="blank"><img src="upload/hinhanh/035853080873687_1349x520.png" alt="hệ thống"></a>
        </div>

        <div class="item">
            <a href="" target="blank"><img src="upload/hinhanh/305646713521362_1349x520.jpg" alt="Thành Lập Doanh Nghiệp"></a>
        </div>

        <div class="item">
            <a href="" target="blank"><img src="upload/hinhanh/976381017573105_1349x520.jpeg" alt="Heyhlonh"></a>
        </div>

        <div class="item">
            <a href="" target="blank"><img src="upload/hinhanh/179575713335812_1349x520.jpg" alt="th"></a>
        </div>

        <div class="item">
            <a href="" target="blank"><img src="upload/hinhanh/111580718383356_1349x520.jpg" alt="laser"></a>
        </div>

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