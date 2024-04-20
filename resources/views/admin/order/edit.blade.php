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
                            <h5>Đơn hàng / <strong> Chỉnh sửa</strong></h5>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.order.update', $order->id)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Mã đơn hàng</label>
                                <input type="text" value="ORD000{{$order->id}}" class="form-control" id="name"
                                       placeholder="Tên sản phẩm" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="total" class="form-label">Tổng tiền</label>
                                <input type="number" value="{{$order->total ?? ''}}" name="total" class="form-control"
                                       id="total" placeholder="Tổng tiền">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Tên người nhận</label>
                                <input type="text" name="sale" value="{{$order->shipping_name ?? ''}}"
                                       class="form-control" id="price" placeholder="Tên người nhận">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Địa chỉ người nhận</label>
                                <input type="text" name="sale" value="{{$order->shipping_address ?? ''}}"
                                       class="form-control" id="price" placeholder="Địa chỉ người nhận">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Số điện thoại người nhận</label>
                                <input type="text" name="sale" value="{{$order->shipping_phone ?? ''}}"
                                       class="form-control" id="price" placeholder="Số điện thoại người nhận">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Trạng thái</label>
                                <select class="form-control" id="order" name="status">
                                    <option selected value="{{$order->status}}">{{Order::STATUSES[$order->status]}}</option>
                                    @foreach(Order::STATUSES as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Ghi chú</label>
                                <textarea name="shipping_note" class="form-control" id="description" rows="6"
                                          placeholder="Ghi chú">{{$order->shipping_note ?? ''}}</textarea>
                            </div>
                            <div class="order-input mb-3">
                                @foreach($details as $detail)
                                <div class="row order-entry mb-2">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order" style="margin-bottom: 5px">Sản phẩm:</label>
                                            <select class="form-control" id="order" name="" disabled>
                                                <option selected>{{$detail->product->name ?? ''}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="amount" style="margin-bottom: 5px">Số lượng:</label>
                                            <input type="number" name=""
                                                   value="{{$detail->quantity ?? ''}}" class="form-control amount"
                                                   id="amount" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="price" style="margin-bottom: 5px">Số tiền:</label>
                                            <input type="text" name=""
                                                   value="{{$detail->product->price ?? ''}}" class="form-control price"
                                                   id="price" disabled>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div style="float: right">
                                <button type="submit" class="btn btn-primary">Xác nhận</button>
                                <a href="{{route('admin.order.index')}}" class="btn btn-danger">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
