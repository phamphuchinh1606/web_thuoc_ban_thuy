<?php use \App\Common\AppCommon; ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <base href="{{asset('')}}">
    <link id="favicon" rel="shortcut icon" href="{{\App\Common\AppCommon::assetPublic('favicon.png')}}" type="image/x-icon" />

    <title>Công Ty TNHH Kỹ Nghệ Toàn Thắng</title>
    <meta name="description" content="">
    <meta name="keywords" content="saonamviet, center, elevator, thangmay, thang máy,">

    <meta name="robots" content="noodp,index,follow" />
    <meta name="google" content="notranslate" />
    <meta name='revisit-after' content='1 days' />
    <meta name="ICBM" content="10.8266157,106.6222343">
    <meta name="geo.position" content="10.8266157,106.6222343">
    <meta name="geo.placename" content="8/3A Phan Văn Hớn, P. Tân Thới Nhất, Q.12, TP. HCM">
    <meta name="author" content="Công Ty TNHH Kỹ Nghệ Toàn Thắng">

    <link rel="stylesheet" href="{{AppCommon::assetPublic('css/guest/libs/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{AppCommon::assetPublic('css/guest/libs/edlc-collapsible-nav.css')}}">
    <link rel="stylesheet" href="{{AppCommon::assetPublic('css/guest/libs/examples.css')}}">

    <link rel="stylesheet" type="text/css" href="{{AppCommon::assetPublic('css/guest/libs/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{AppCommon::assetPublic('css/guest/libs/reset.css')}}">
    <link rel="stylesheet" type="text/css" href="{{AppCommon::assetPublic('css/guest/libs/font-awesome.css')}}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">

    <script type="text/javascript" src="{{AppCommon::assetPublic('js/guest/libs/jquery-1.8.2.min.js')}}"></script>
    <script type="text/javascript" language="javascript" src="{{AppCommon::assetPublic('js/guest/libs/jquery.carouFredSel-6.2.0-packed.js')}}"></script>
    <script type="text/javascript" src="{{AppCommon::assetPublic('js/guest/libs/moment-with-locales.js')}}"></script>
    <script type="text/javascript" src="{{AppCommon::assetPublic('js/guest/libs/bootstrap-datetimepicker.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{AppCommon::assetPublic('css/guest/libs/jquery.fancybox.min.css')}}">
    <script src="{{AppCommon::assetPublic('js/guest/libs/jquery.fancybox.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-fancybox]').fancybox({
                protect: true,
                thumbs : {
                    autoStart : true,
                    axis      : 'y'
                }
            });
        });
    </script>
    <script src="{{AppCommon::assetPublic('js/guest/libs/SmoothScroll.js')}}"></script>
    <link rel="stylesheet" href="{{AppCommon::assetPublic('css/guest/libs/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{AppCommon::assetPublic('css/guest/libs/owl.theme.default.min.css')}}" />
    <script src="{{AppCommon::assetPublic('js/guest/libs/owl.carousel.js')}}"></script>
    <!-- <script src=js/OwlCarousel2Thumbs.min.js></script> -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('.owl-slider').owlCarousel({
                items : 1,
                autoplay : true,
                nav : false,
                loop : true,
                navText : false,
                dots : true
            });
            $('.owl-doitac').owlCarousel({
                items : 4,
                autoplay : false,
                nav : true,
                loop : true,
                navText : false,
                margin : 25,
                dots : false,
                responsive : {
                    // breakpoint from 0 up
                    0 : {
                        items : 2,
                    },
                    // breakpoint from 480 up
                    480 : {
                        items : 3,
                    },
                    // breakpoint from 768 up
                    768 : {
                        items : 4,
                    },
                    1024 : {
                        items : 6,
                    }
                }
            });
        });
    </script>

    <link type="text/css" rel="stylesheet" href="{{AppCommon::assetPublic('css/guest/libs/jquery.mmenu.all.css')}}" />
    <script type="text/javascript" src="{{AppCommon::assetPublic('js/guest/libs/jquery.mmenu.all.min.js')}}"></script>
    <script type="text/javascript">
        $(function() {
            $('nav#nav-rp').mmenu({
                extensions  : [ 'effect-slide-menu', 'pageshadow' ],
                searchfield : false,
                counters  : true,
                navbar    : {
                    title   : ''
                },
                navbars   : [
                    {
                        position  : 'top',
                        content   : '<a href="" class="logo-menu"><img src="upload/hinhanh/logotrangcenter-8522_166x72.png" height="60"></a>',
                    }, {
                        position  : 'top',
                        content   : [
                            'prev',
                            'title',
                            'close'
                        ]
                    }, {
                        position  : 'bottom',
                    }
                ]
            });
        });
    </script>
    <link rel="stylesheet" type="text/css" href="{{AppCommon::assetPublic('css/guest/libs/bootstrap-datetimepicker.css')}}">
    <script type="text/javascript" src="{{AppCommon::assetPublic('js/guest/libs/bootstrap.min.js')}}"></script>
    <script type='text/javascript'>
        $(document).ready(function () {
            if((window).innerWidth>=320){
                $(window).scroll(function(){
                    var scrollTop  = $(window).scrollTop();
                    //alert(scrollTop);
                    if(scrollTop >30 ){
                        $('.fix-nav').addClass('small');
                    }else{
                        $('.fix-nav').removeClass('small');
                    }

                })
            }
        });
    </script>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1577805669146955";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
</head>

<body>
<div class="wrapper">
    <!-- Header Top -->
    @include('guest.layouts.partials.__header')

    <!-- Content -->
    @yield('body.content')

    <!-- Footer -->
    @include('guest.layouts.partials.__footer')

</div>


<div id="nova_phone_div" class="nova-phone nova-green nova-show">
    <div class="nova-ph-circle"></div>
    <div class="nova-ph-circle-fill"></div>
    <a href="tel:0907 130 484-0938957362">
        <div class="nova-ph-img-circle"></div>
        <div class="suntory-phone">0907 130 484-0938957362</div>
    </a>
</div>
</body>
</html>