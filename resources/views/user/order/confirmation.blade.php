@php use App\Models\Order; @endphp
@extends('user.layouts.main')
@section('content')
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-title">
                            <h5>Đơn hàng của bạn ở trạng thái {{Order::STATUSES[$order->status]}}</h5>
                        </div>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cartItems as $key => $value)
                                <tr>
                                    <th scope="row">
                                        {{$key+1}}
                                    </th>
                                    <td>{{$value->product->name ?? ''}}</td>
                                    <td>{{$value->quantity ?? ''}}</td>
                                    <td>{{$value->product->price ?? ''}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-summary">
                        <h5>Giá trị đơn hàng</h5>
                        <ul class="summary-table">
                            <li><span>Tổng giá trị:</span>
                                <span>{{number_format($order->total, 0, ',', '.')}} VNĐ</span></li>
                            <li><span>Vận chuyển:</span> <span>Free</span></li>
                            <li><span>Giá tiền:</span> <span>{{number_format($order->total, 0, ',', '.')}} VNĐ</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
