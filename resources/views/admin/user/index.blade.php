@php use App\Models\User; @endphp
@extends('admin.layouts.main')
@section('content')
    <div class="body-wrapper">
        @include('admin.layouts.auth')
        <!--  Header End -->
        <div class="container-fluid">
            <div class="table-container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="table-heading">
                            <h5>Người dùng / <strong>Danh sách</strong></h5>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end align-items-center mb-2">
                        <a href="{{route('admin.user.create')}}" class="btn btn-secondary add-button">Thêm Người
                            dùng</a>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Quyền</th>
                        <th scope="row" width="20%">Địa chỉ</th>
                        <th scope="row">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id ?? ''}}</th>
                            <td>{{$user->name ?? ''}}</td>
                            <td>{{$user->phone ?? ''}}</td>
                            <td>{{$user->email ?? ''}}</td>
                            <td>{{$user->role ? User::ARRAY_ROLE[$user->role] : ''}}</td>
                            <td>{{$user->address ?? ''}}</td>
                            <td>
                                <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-primary">Sửa</a>
                                <a href="{{route('admin.user.destroy', $user->id)}}" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
