<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="sidebar-item item-custom active">
                    <a class="" href="{{route('admin.product.index')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                        <span class="hide-menu">Sản phẩm</span>
                    </a>
                </li>
                <li class="sidebar-item item-custom">
                    <a class="" href="" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>

                </span>
                        <span class="hide-menu">Người dùng</span>
                    </a>
                </li>
                <li class="sidebar-item item-custom">
                    <a class="" href="" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>

                </span>
                        <span class="hide-menu">Nhân viên</span>
                    </a>
                </li>
                <li class="sidebar-item item-custom">
                    <a class="" href="" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>

                </span>
                        <span class="hide-menu">Đơn đặt hàng </span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<style>
    .left-sidebar .item-custom {
        margin-bottom: 15px;
    }

    /* Định dạng cho các mục chưa được chọn */
    .left-sidebar .item-custom a {
        color: black;
        font-size: 16px;
    }

    .left-sidebar .item-custom.active a {
        color: #007bff;
        font-weight: bold;
    }

</style>
