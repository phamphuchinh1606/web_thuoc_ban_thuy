@extends('guest.layouts.master')

@section('body.content')
    <div id="wrapper">
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="left-content col-md-3 col-sm-3 col-xs-12 pull-left mt-20">
                        @include('guest.collection.__left_content')
                    </div>

                    <div class="left-content col-md-9 col-sm-9 col-xs-12 pull-right mt-20">
                        @include('guest.collection.__center_content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection