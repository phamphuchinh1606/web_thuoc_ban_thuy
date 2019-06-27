@extends('guest.layouts.master')

@section('body.content')
    <!-- Slider -->
    @include('guest.home.partials.__slider')
    <div id="wrapper">
        <div class="main">
            <!-- Product Height Light -->
            @include('guest.home.partials.__product_height_light')

            <!-- News -->
            @include('guest.home.partials.__news')

            <!-- Partner -->
            @include('guest.home.partials.__partner')
        </div>
    </div>
@endsection