@extends('admin.layouts.master')

@section('body.breadcrumb')
    {{ Breadcrumbs::render('admin.home') }}
@endsection

@section('body.content')
    <div class="container-fluid">
        <div id="ui-view">
            <div class="row">
                <table class="table table-responsive-sm table-hover table-outline mb-0">
                    <thead class="thead-light">
                    <tr>
                        <th class="text-center">
                            STT
                        </th>
                        <th>Hò và tên</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Ngày liên hệ</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($contactsNew as $index => $contact)
                            <tr>
                                <td class="text-center">
                                    {{$index+1}}
                                </td>
                                <td>
                                    {{$contact->guest_name}}
                                </td>
                                <td>
                                    {{$contact->guest_phone}}
                                </td>
                                <td>
                                    {{$contact->guest_email}}
                                </td>
                                <td>
                                    {{$contact->created_at}}
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-success" href="{{route('admin.contact.show',['id' => $contact->id])}}">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
