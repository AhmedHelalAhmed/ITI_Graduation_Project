<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <!-- Start Bootstrap 4.1 head -->
@include('layouts.head_bootstrap4')
<!-- end Bootstrap 4.1 head -->

    <!-- Start CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- End CSRF Token -->

    <!-- Start Title -->
@yield('title')
<!-- End Title -->

    <!-- Start global style -->
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    <!-- End Global Style -->


    <!-- Start Style -->
@yield('style')
<!-- End Style -->


    <!-- Start include in head -->
@yield('include_files_head')
<!-- end include in head -->


</head>

<body>

<!-- start header -->
<header class="main">
    <!-- Start navigation -->
@include('layouts.nav')
<!-- End navigation -->
</header>
<!-- end header -->


<!-- Start Common Content-->
@yield('content')
<!-- End Common Content-->


<!-- Start sidebar -->
@yield('sidebar')
<!-- End sidebar -->


<!-- Start Footer -->
<footer>
    Copyright 2018 © All Right Reserved to ITI
</footer>
<!-- End Footer-->

<!-- Start Bootstrap 4.1 body -->
@include('layouts.body_bootstrap4')
<!-- end Bootstrap 4.1 body -->

<!-- Start include in body -->
@yield('include_files_body')
<!-- end include in body -->

</body>

</html>