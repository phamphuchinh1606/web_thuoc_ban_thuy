@extends('admin.layouts.master')

@section('head.title','Danh Sách Tin Tức')

@section('head.css')
    <link href="{{asset('css/admin/plugins/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection

@section('body.js')
    <script type="text/javascript" src="{{asset('js/admin/plugins/jquery.dataTables.js')}}" class="view-script"></script>
    <script type="text/javascript" src="{{asset('js/admin/plugins/dataTables.bootstrap4.js')}}" class="view-script"></script>
    {{--<script type="text/javascript" src="{{asset('js/admin/plugins/datatables.js')}}" class="view-script"></script>--}}
@endsection
@section('body.breadcrumb')
    {{ Breadcrumbs::render('admin.blog') }}
@endsection

@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div>
                <div class="animated fadeIn">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-edit"></i> Danh Sách Tin Tức
                            <div class="card-header-actions">
                                <a class="btn btn-block btn-outline-primary active" href="{{route('admin.blog.create')}}">
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
                                                <th>
                                                    STT
                                                </th>
                                                <th>
                                                    Hình ảnh
                                                </th>
                                                <th>
                                                    Tiêu đề
                                                </th>
                                                <th>
                                                    Ngày đăng
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
                                                @foreach($blogs as $index => $blog)
                                                    <tr>
                                                        <td>
                                                            {{$index + 1}}
                                                        </td>
                                                        <td>
                                                            <img src="{{asset(\App\Common\Constant::$PATH_URL_UPLOAD_IMAGE.$blog->blog_image)}}"
                                                                width="100" height="100"/>
                                                        </td>
                                                        <td>
                                                            {{$blog->blog_title}}
                                                        </td>
                                                        <td>
                                                            {{$blog->str_post_date}}
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="badge {{$blog->public_class}}">{{$blog->public_name}}</span>
                                                        </td>
                                                        <td class="text-center">
                                                            {{--<a class="btn btn-success" href="#">--}}
                                                                {{--<i class="fa fa-search-plus"></i>--}}
                                                            {{--</a>--}}
                                                            <a class="btn btn-info" href="{{route('admin.blog.update',['id' => $blog->id])}}">
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
