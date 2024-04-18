<!-- Header Area Start -->
<header class="header-area clearfix">
    <!-- Close Icon -->
    <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <!-- Amado Nav -->
    <nav class="amado-nav">
        <ul>
            <li class="{{ Request::routeIs('user.index') ? 'active' : '' }}" ><a href="{{route('user.index')}}">Trang chủ </a></li>
            <li class="{{ Request::routeIs('user.shop.index') ? 'active' : '' }}" ><a href="{{route('user.shop.index')}}">Sản phẩm</a></li>
           @if(auth()->user())
                <li class="{{ Request::routeIs('user.order.confirmation') ? 'active' : '' }}" ><a href="{{route('user.order.confirmation')}}">Đơn hàng của bạn</a></li>
            @else
                <li class="" ><a href="{{route('login.index')}}">Đăng nhập</a></li>
           @endif
        </ul>
    </nav>
    <!-- Cart Menu -->
    <div class="cart-fav-search mb-100">
        <a href="{{route('user.cart.index')}}" class="cart-nav"><img src="/employee/img/core-img/cart.png" alt=""> Giỏ hàng</a>
    </div>
    <!-- Social Button -->
    <div class="social-info d-flex justify-content-between">
        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    </div>
</header>
<!-- Header Area End -->
