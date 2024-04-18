@extends('user.layouts.main')
@section('content')
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="cart-title mt-50">
                        <h2>Giỏ hàng</h2>
                    </div>

                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($carts as $cart)
                                <tr>
                                    <td class="cart_product_img">
                                        <a href="#"><img src="/employee/img/bg-img/candle3.jpg" alt="Product"></a>
                                    </td>
                                    <td class="cart_product_desc">
                                        <h5>{{$cart->product->name ?? ''}}</h5>
                                    </td>
                                    <td class="price">
                                        <span>{{number_format($cart->product->price, 0, ',', '.')}} VNĐ</span>
                                    </td>
                                    <td class="qty">
                                        {{$cart->quantity ?? ''}}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-summary">
                        <h5>Cart Total</h5>
                        <ul class="summary-table">
                            <li><span>Tổng giá trị sản phẩm:</span> <span>{{number_format($totalPrice, 0, ',', '.')}} VNĐ</span>
                            </li>
                            <li><span>Vân chuyển:</span> <span>Free</span></li>
                            <li><span>Tổng tiền:</span> <span>{{number_format($totalPrice, 0, ',', '.')}} VNĐ</span>
                            </li>
                        </ul>
                        <div class="cart-btn mt-100">
                            <form action="{{route('user.order.create')}}" method="POST">
                                @csrf
                                <button type="submit" class="btn amado-btn w-100">Xác nhận đơn hàng</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
