<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado</title>

    <!-- Favicon  -->
    <link rel="icon" href="/employee/img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="/employee/css/core-style.css">
    <link rel="stylesheet" href="/employeestyle.css">

</head>

<body>
<!-- ##### Main Content Wrapper Start ##### -->
<div class="main-content-wrapper d-flex clearfix">

    <!-- Mobile Nav (max width 767px)-->
    <div class="mobile-nav">
        <!-- Navbar Brand -->
        <div class="amado-navbar-brand">
            <a href="#"><img src="/employee/img/core-img/logo.png" alt=""></a>
        </div>
        <!-- Navbar Toggler -->
        <div class="amado-navbar-toggler">
            <span></span><span></span><span></span>
        </div>
    </div>
@include('user.layouts.header')
   @yield('content')
</div>
<!-- ##### Main Content Wrapper End ##### -->
@include('user.layouts.footer')
<!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
<script src="/employee/js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="/employee/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="/employee/js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="/employee/js/plugins.js"></script>
<!-- Active js -->
<script src="/employee/js/active.js"></script>

</body>

</html>
