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
                            <h5>Người dùng / <strong> Chỉnh sửa</strong></h5>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.user.update', $user->id)}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên Người dùng</label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control" id="name" placeholder="Tên Người dùng">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" value="{{$user->email}}" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="text" name="phone" value="{{$user->phone}}" class="form-control" id="phone" placeholder="Số điện thoại">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input type="text" name="address" value="{{$user->address}}" class="form-control" id="address" placeholder="Địa chỉ">
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Tuổi</label>
                                <input type="number" name="age" value="{{$user->age}}" class="form-control" id="age" placeholder="Tuổi">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Mật khẩu">
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Quyền</label>
                                <select name="role" class="form-control">
                                    <option selected>{{$user->role ? User::ARRAY_ROLE[$user->role] : ''}}</option>
                                    <option value="admin">Quản trị viên </option>
                                    <option value="user">Người dùng</option>
                                </select>
                            </div>
                            <div style="float: right">
                                <button type="submit" class="btn btn-primary">Tạo mới</button>
                                <a href="{{route('admin.user.index')}}" class="btn btn-danger">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
