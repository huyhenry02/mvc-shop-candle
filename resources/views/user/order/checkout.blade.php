@extends('user.layouts.main')
@section('content')
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-title">
                            <h2> Xác nhận đơn hàng </h2>
                        </div>
                        <form action="{{route('user.approvedOrder', ['orderId' => $orderId])}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <input type="text" name="shipping_name" class="form-control" id="first_name" value="" placeholder="Tên người nhận" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" name="shipping_address" class="form-control" id="company" placeholder="Địa chỉ nhận hàng" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="email" name="shipping_name" class="form-control" id="email" placeholder="Email người nhận" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" name="shipping_phone" class="form-control" id="email" placeholder="SĐT người nhận" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <textarea name="note" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="Hãy để lại lời nhắn của bạn"></textarea>
                                </div>
                                <div class="cart-btn" style="margin-left: 15px">
                                    <button type="submit" class="btn amado-btn w-100">Xác nhận</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-summary">
                        <h5>Giá trị đơn hàng</h5>
                        <ul class="summary-table">
                            <li><span>Tổng giá trị:</span> <span>{{number_format($totalPrice, 0, ',', '.')}} VNĐ</span></li>
                            <li><span>Vận chuyển:</span> <span>Free</span></li>
                            <li><span>Giá tiền:</span> <span>{{number_format($totalPrice, 0, ',', '.')}} VNĐ</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
