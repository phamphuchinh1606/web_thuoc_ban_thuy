<?php use App\Common\Constant; ?>

@extends('admin.layouts.master')

@section('head.title','Danh Sách Loại Thiêt Bị')

@section('head.css')
    <link href="{{asset('css/admin/plugins/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection

@section('body.js')
    <script type="text/javascript" src="{{asset('js/admin/plugins/jquery.dataTables.js')}}" class="view-script"></script>
    <script type="text/javascript" src="{{asset('js/admin/plugins/dataTables.bootstrap4.js')}}" class="view-script"></script>
    {{--<script type="text/javascript" src="{{asset('js/admin/plugins/datatables.js')}}" class="view-script"></script>--}}
@endsection

@section('body.breadcrumb')
    {{ Breadcrumbs::render('admin.equipmentType') }}
@endsection

@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-edit"></i> Danh Sách Loại Thiết Bị
                            <div class="card-header-actions">
                                <a class="btn btn-block btn-outline-primary active" href="{{route('admin.equipment_type.create')}}">
                                    Tạo mới
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc">
                                                        Số Thứ Tự
                                                    </th>
{{--                                                    <th class="sorting">--}}
{{--                                                        Icon Thiết Bị--}}
{{--                                                    </th>--}}
                                                    <th class="sorting">
                                                        Tên Loại Thiết Bị
                                                    </th>
                                                    <th class="sorting">
                                                        Tình Trạng
                                                    </th>
                                                    <th class="sorting">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($listEquipmentType as $index => $equipmentType)
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            {{$index + 1}}
                                                        </td>
{{--                                                        <td>--}}
{{--                                                            <img src="{{asset(Constant::$PATH_URL_UPLOAD_IMAGE.$equipmentType->image_icon)}}" width="20" height="20"/>--}}
{{--                                                        </td>--}}
                                                        <td>
                                                            {{$equipmentType->equipment_type_name}}
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="badge {{$equipmentType->public_class}}">{{$equipmentType->public_name}}</span>
                                                        </td>
                                                        <td class="text-center">
                                                            {{--<a class="btn btn-success" href="#">--}}
                                                                {{--<i class="fa fa-search-plus"></i>--}}
                                                            {{--</a>--}}
                                                            <a class="btn btn-info" href="{{route('admin.equipment_type.update',['id' => $equipmentType->id])}}">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            {{--<a class="btn btn-danger" href="#">--}}
                                                                {{--<i class="fa fa-trash-o"></i>--}}
                                                            {{--</a>--}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
