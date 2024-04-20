@php use App\Models\Order; @endphp
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
                            <h5>Đơn hàng / <strong>Danh sách</strong></h5>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end align-items-center mb-2">
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Người đặt</th>
                        <th scope="col">Tên người nhận</th>
                        <th scope="col">Địa chỉ người nhận</th>
                        <th scope="col">Số điện thoại người nhận</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="row">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{$order->id ?? ''}}</th>
                            <td>ORD000{{$order->id ?? ''}}</td>
                            <td>{{$order->user->name ?? ''}}</td>
                            <td>{{$order->shipping_name ?? ''}}</td>
                            <td>{{$order->shipping_address ?? ''}}</td>
                            <td>{{$order->shipping_phone ?? ''}}</td>
                            <td>{{number_format($order->total ?? '', 0, ',', '.')}} VNĐ</td>
                            <td>{{Order::STATUSES[$order->status ?? '']}}</td>
                            <td>
                                <a href="{{route('admin.order.edit', $order->id)}}" class="btn btn-primary">Sửa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
