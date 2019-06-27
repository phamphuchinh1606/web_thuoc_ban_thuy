<?php use App\Common\AppCommon; ?>
@extends('admin.layouts.master')

@section('head.title','Danh sách đơn đặt hàng')

@section('head.css')
    <link href="{{asset('css/admin/plugins/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin/plugins/daterangepicker.min.css')}}" rel="stylesheet">
@endsection

@section('body.breadcrumb')
    {{ Breadcrumbs::render('admin.order') }}
@endsection


@section('body.js')
    <script type="text/javascript" src="{{asset('js/admin/plugins/moment.min.js')}}" class="view-script"></script>
    <script type="text/javascript" src="{{asset('js/admin/plugins/jquery.dataTables.js')}}" class="view-script"></script>
    <script type="text/javascript" src="{{asset('js/admin/plugins/dataTables.bootstrap4.js')}}" class="view-script"></script>
    <script type="text/javascript" src="{{asset('js/admin/plugins/daterangepicker.min.js')}}" class="view-script"></script>
    <script>
        let startDate = "{{$searchForm['order_date']}}".split("-")[0];
        let endDate = "{{$searchForm['order_date']}}".split("-")[1];
        console.log(startDate);
    </script>
    <script type="text/javascript" src="{{asset('js/admin/advanced-forms.js')}}" class="view-script"></script>
@endsection

@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="card">
                        <div class="card-header">
                            <a data-toggle="collapse" data-parent="#searchForm" href="#searchForm" aria-expanded="true" aria-controls="searchForm" class="collapsed">
                                <i class="fa fa-edit"></i> Danh sách đơn đặt hàng
                            </a>
                        </div>
                        <div class="card-body">
                            @if(\Session::has('message'))
                                <div class="alert alert-success"> {{ \Session::get('message') }}</div>
                            @endif
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="collapse col-md-12" id="searchForm" role="tabpanel" style="">
                                        @include('admin.order.partials.__form_search_order',['searchForm' => $searchForm])
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                            <thead>
                                            <tr role="row">
                                                <th>
                                                    STT
                                                </th>
                                                <th>
                                                    Mã đơn hàng
                                                </th>
                                                <th>
                                                    Họ và tên
                                                </th>
                                                <th>
                                                    Số điện thoại
                                                </th>
                                                <th>
                                                    Email
                                                </th>
                                                <th>
                                                    Ngày đặt hàng
                                                </th>
                                                <th>
                                                    Tổng tiền
                                                </th>
                                                <th>
                                                    Tình trạng
                                                </th>
                                                <th>
                                                    Actions
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $index => $order)
                                                <tr>
                                                    <td>
                                                        {{$index + 1}}
                                                    </td>
                                                    <td>
                                                        {{$order->order_code}}
                                                    </td>
                                                    <td>
                                                        {{$order->full_name}}
                                                    </td>
                                                    <td>
                                                        {{$order->phone_number}}
                                                    </td>
                                                    <td>
                                                        {{$order->email}}
                                                    </td>
                                                    <td class="text-center">
                                                        {{AppCommon::dateFormat($order->order_date)}}
                                                    </td>
                                                    <td class="text-right">
                                                        {{AppCommon::formatMoney($order->total_amount)}}₫
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge {{$order->status_class}}">{{$order->status_name}}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn btn-success" href="{{route('admin.order.detail',['id' => $order->id])}}">
                                                            <i class="fa fa-search-plus"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="pull-right">
                                            {{ $orders->appends($searchForm)->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<div class="daterangepicker ltr show-ranges opensleft" style="display: none; top: 608px;"><div class="ranges"><ul><li data-range-key="Today" class="active">Today</li><li data-range-key="Yesterday">Yesterday</li><li data-range-key="Last 7 Days">Last 7 Days</li><li data-range-key="Last 30 Days">Last 30 Days</li><li data-range-key="This Month">This Month</li><li data-range-key="Last Month">Last Month</li><li data-range-key="Custom Range">Custom Range</li></ul></div><div class="drp-calendar left"><div class="calendar-table"><table class="table-condensed"><thead><tr><th class="prev available"><span></span></th><th colspan="5" class="month">Oct 2018</th><th></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off available" data-title="r0c0">30</td><td class="available" data-title="r0c1">1</td><td class="available" data-title="r0c2">2</td><td class="available" data-title="r0c3">3</td><td class="available" data-title="r0c4">4</td><td class="available" data-title="r0c5">5</td><td class="weekend available" data-title="r0c6">6</td></tr><tr><td class="weekend available" data-title="r1c0">7</td><td class="available" data-title="r1c1">8</td><td class="available" data-title="r1c2">9</td><td class="available" data-title="r1c3">10</td><td class="available" data-title="r1c4">11</td><td class="available" data-title="r1c5">12</td><td class="weekend available" data-title="r1c6">13</td></tr><tr><td class="weekend available" data-title="r2c0">14</td><td class="available" data-title="r2c1">15</td><td class="available" data-title="r2c2">16</td><td class="available" data-title="r2c3">17</td><td class="available" data-title="r2c4">18</td><td class="available" data-title="r2c5">19</td><td class="weekend available" data-title="r2c6">20</td></tr><tr><td class="today weekend active start-date active end-date available" data-title="r3c0">21</td><td class="available" data-title="r3c1">22</td><td class="available" data-title="r3c2">23</td><td class="available" data-title="r3c3">24</td><td class="available" data-title="r3c4">25</td><td class="available" data-title="r3c5">26</td><td class="weekend available" data-title="r3c6">27</td></tr><tr><td class="weekend available" data-title="r4c0">28</td><td class="available" data-title="r4c1">29</td><td class="available" data-title="r4c2">30</td><td class="available" data-title="r4c3">31</td><td class="off available" data-title="r4c4">1</td><td class="off available" data-title="r4c5">2</td><td class="weekend off available" data-title="r4c6">3</td></tr><tr><td class="weekend off available" data-title="r5c0">4</td><td class="off available" data-title="r5c1">5</td><td class="off available" data-title="r5c2">6</td><td class="off available" data-title="r5c3">7</td><td class="off available" data-title="r5c4">8</td><td class="off available" data-title="r5c5">9</td><td class="weekend off available" data-title="r5c6">10</td></tr></tbody></table></div><div class="calendar-time" style="display: none;"></div></div><div class="drp-calendar right"><div class="calendar-table"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Nov 2018</th><th class="next available"><span></span></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off available" data-title="r0c0">28</td><td class="off available" data-title="r0c1">29</td><td class="off available" data-title="r0c2">30</td><td class="off available" data-title="r0c3">31</td><td class="available" data-title="r0c4">1</td><td class="available" data-title="r0c5">2</td><td class="weekend available" data-title="r0c6">3</td></tr><tr><td class="weekend available" data-title="r1c0">4</td><td class="available" data-title="r1c1">5</td><td class="available" data-title="r1c2">6</td><td class="available" data-title="r1c3">7</td><td class="available" data-title="r1c4">8</td><td class="available" data-title="r1c5">9</td><td class="weekend available" data-title="r1c6">10</td></tr><tr><td class="weekend available" data-title="r2c0">11</td><td class="available" data-title="r2c1">12</td><td class="available" data-title="r2c2">13</td><td class="available" data-title="r2c3">14</td><td class="available" data-title="r2c4">15</td><td class="available" data-title="r2c5">16</td><td class="weekend available" data-title="r2c6">17</td></tr><tr><td class="weekend available" data-title="r3c0">18</td><td class="available" data-title="r3c1">19</td><td class="available" data-title="r3c2">20</td><td class="available" data-title="r3c3">21</td><td class="available" data-title="r3c4">22</td><td class="available" data-title="r3c5">23</td><td class="weekend available" data-title="r3c6">24</td></tr><tr><td class="weekend available" data-title="r4c0">25</td><td class="available" data-title="r4c1">26</td><td class="available" data-title="r4c2">27</td><td class="available" data-title="r4c3">28</td><td class="available" data-title="r4c4">29</td><td class="available" data-title="r4c5">30</td><td class="weekend off available" data-title="r4c6">1</td></tr><tr><td class="weekend off available" data-title="r5c0">2</td><td class="off available" data-title="r5c1">3</td><td class="off available" data-title="r5c2">4</td><td class="off available" data-title="r5c3">5</td><td class="off available" data-title="r5c4">6</td><td class="off available" data-title="r5c5">7</td><td class="weekend off available" data-title="r5c6">8</td></tr></tbody></table></div><div class="calendar-time" style="display: none;"></div></div><div class="drp-buttons"><span class="drp-selected">10/21/2018 - 10/21/2018</span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" type="button">Apply</button> </div></div>--}}
    {{--<div class="daterangepicker ltr show-ranges opensleft show-calendar" style="display: none;"><div class="ranges"><ul><li data-range-key="Today">Today</li><li data-range-key="Yesterday">Yesterday</li><li data-range-key="Last 7 Days">Last 7 Days</li><li data-range-key="Last 30 Days">Last 30 Days</li><li data-range-key="This Month">This Month</li><li data-range-key="Last Month">Last Month</li><li data-range-key="Custom Range" class="active">Custom Range</li></ul></div><div class="calendar left"><div class="calendar-table"><table class="table-condensed"><thead><tr><th class="prev available"><span></span></th><th colspan="5" class="month">Sep 2018</th><th></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off available" data-title="r0c0">26</td><td class="off available" data-title="r0c1">27</td><td class="off available" data-title="r0c2">28</td><td class="off available" data-title="r0c3">29</td><td class="off available" data-title="r0c4">30</td><td class="off available" data-title="r0c5">31</td><td class="weekend available" data-title="r0c6">1</td></tr><tr><td class="weekend available" data-title="r1c0">2</td><td class="available" data-title="r1c1">3</td><td class="available" data-title="r1c2">4</td><td class="available" data-title="r1c3">5</td><td class="available" data-title="r1c4">6</td><td class="available" data-title="r1c5">7</td><td class="weekend available" data-title="r1c6">8</td></tr><tr><td class="weekend available" data-title="r2c0">9</td><td class="available" data-title="r2c1">10</td><td class="available" data-title="r2c2">11</td><td class="available" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="weekend available" data-title="r2c6">15</td></tr><tr><td class="weekend available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="active start-date available" data-title="r3c5">21</td><td class="weekend in-range available" data-title="r3c6">22</td></tr><tr><td class="weekend in-range available" data-title="r4c0">23</td><td class="in-range available" data-title="r4c1">24</td><td class="in-range available" data-title="r4c2">25</td><td class="in-range available" data-title="r4c3">26</td><td class="in-range available" data-title="r4c4">27</td><td class="in-range available" data-title="r4c5">28</td><td class="weekend in-range available" data-title="r4c6">29</td></tr><tr><td class="weekend in-range available" data-title="r5c0">30</td><td class="off in-range available" data-title="r5c1">1</td><td class="off in-range available" data-title="r5c2">2</td><td class="off in-range available" data-title="r5c3">3</td><td class="off in-range available" data-title="r5c4">4</td><td class="off in-range available" data-title="r5c5">5</td><td class="weekend off in-range available" data-title="r5c6">6</td></tr></tbody></table></div><div class="calendar-time" style="display: none;"></div></div><div class="calendar right"><div class="calendar-table"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Oct 2018</th><th class="next available"><span></span></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off in-range available" data-title="r0c0">30</td><td class="in-range available" data-title="r0c1">1</td><td class="in-range available" data-title="r0c2">2</td><td class="in-range available" data-title="r0c3">3</td><td class="in-range available" data-title="r0c4">4</td><td class="in-range available" data-title="r0c5">5</td><td class="weekend in-range available" data-title="r0c6">6</td></tr><tr><td class="weekend in-range available" data-title="r1c0">7</td><td class="in-range available" data-title="r1c1">8</td><td class="in-range available" data-title="r1c2">9</td><td class="in-range available" data-title="r1c3">10</td><td class="in-range available" data-title="r1c4">11</td><td class="in-range available" data-title="r1c5">12</td><td class="weekend in-range available" data-title="r1c6">13</td></tr><tr><td class="weekend in-range available" data-title="r2c0">14</td><td class="in-range available" data-title="r2c1">15</td><td class="in-range available" data-title="r2c2">16</td><td class="in-range available" data-title="r2c3">17</td><td class="in-range available" data-title="r2c4">18</td><td class="in-range available" data-title="r2c5">19</td><td class="weekend active end-date in-range available" data-title="r2c6">20</td></tr><tr><td class="today weekend available" data-title="r3c0">21</td><td class="available" data-title="r3c1">22</td><td class="available" data-title="r3c2">23</td><td class="available" data-title="r3c3">24</td><td class="available" data-title="r3c4">25</td><td class="available" data-title="r3c5">26</td><td class="weekend available" data-title="r3c6">27</td></tr><tr><td class="weekend available" data-title="r4c0">28</td><td class="available" data-title="r4c1">29</td><td class="available" data-title="r4c2">30</td><td class="available" data-title="r4c3">31</td><td class="off available" data-title="r4c4">1</td><td class="off available" data-title="r4c5">2</td><td class="weekend off available" data-title="r4c6">3</td></tr><tr><td class="weekend off available" data-title="r5c0">4</td><td class="off available" data-title="r5c1">5</td><td class="off available" data-title="r5c2">6</td><td class="off available" data-title="r5c3">7</td><td class="off available" data-title="r5c4">8</td><td class="off available" data-title="r5c5">9</td><td class="weekend off available" data-title="r5c6">10</td></tr></tbody></table></div><div class="calendar-time" style="display: none;"></div></div><div class="drp-buttons"><span class="drp-selected">2018-09-21 - 2018-10-20</span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" type="button">Apply</button> </div></div>--}}
@endsection
