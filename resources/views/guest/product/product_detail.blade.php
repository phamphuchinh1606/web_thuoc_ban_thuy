@extends('guest.layouts.master')

@section('head.css')
    <link rel="stylesheet" href="{{\App\Common\AppCommon::assetPublic('css/guest/libs/jquery.fancybox.css')}}">
    <link rel="stylesheet" href="{{\App\Common\AppCommon::assetPublic('css/guest/libs/jquery.bxslider.css')}}">
@endsection

@section('body.js')
    <script src="{{\App\Common\AppCommon::assetPublic('js/guest/libs/jquery.fancybox.js')}}"></script>
    <script src="{{\App\Common\AppCommon::assetPublic('js/guest/libs/jquery.bxslider.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.bx-slider').bxSlider({
                mode: 'vertical',
                minSlides: 5,
                pager:false,
                slideMargin: 5
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('.bx-slider a').click(function(){
                var largeImage = $(this).attr('data-full');
                var orinal = $(this).attr('data-original');
                $('.selected').removeClass();
                $(this).addClass('selected');
                $('.full img').hide();
                $('.full img').attr('src', largeImage);
                $('.full a').attr('href', orinal);
                $('.full img').fadeIn();
                $("a[rel=example_group]").fancybox({
                    'transitionIn'    : 'none',
                    'transitionOut'   : 'none',
                    'titlePosition'   : 'over',
                    'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
                        return '<span id="fancybox-title-over">Image ' +  (currentIndex + 1) + ' / ' + currentArray.length + ' ' + title + '</span>';
                    }
                });
            }); // closing the listening on a click
            /*$('.full img').on('click', function(){
              var modalImage = $(this).data('src');
              $.fancybox.open(modalImage);
            });*/
            $("a[rel=example_group]").fancybox({
                'transitionIn'    : 'none',
                'transitionOut'   : 'none',
                'titlePosition'   : 'over',
                'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
                    return '<span id="fancybox-title-over">Image ' +  (currentIndex + 1) + ' / ' + currentArray.length + ' ' + title + '</span>';
                }
            });

        }); //closing our doc ready
    </script>
@endsection

@section('body.content')
    <div id="wrapper">
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="left-content col-md-3 col-sm-3 col-xs-12 pull-left mt-20">
                        @include('guest.common.__left_product_type_list')
                    </div>

                    <div class="left-content col-md-9 col-sm-9 col-xs-12 pull-right mt-20">
                        @include('guest.product.__product_content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection