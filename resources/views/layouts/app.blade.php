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

    <!-- Start Normalize.css -->
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <!-- End Normalize.css -->

    <!-- Start global style -->
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    <!-- End Global Style -->


    <!-- font-awesome -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"
            rel="stylesheet"  type='text/css'>
    <!-- font-awesome  -->

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
<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span class="copyright">
                        Copyright &copy; All Right Reserved to ITI
                </span>
            </div>
            <div class="col-md-4">
                <ul class="list-inline social-buttons">
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-inline quicklinks">
                    <li class="list-inline-item">
                        <a href="#">Privacy Policy</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">Terms of Use</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>


<!-- End Footer-->







<!-- Start Bootstrap 4.1 body -->
@include('layouts.body_bootstrap4')
<!-- end Bootstrap 4.1 body -->

<!-- Start include in body -->
@yield('include_files_body')
<!-- end include in body -->



<!-- Start markasread -->
<script src="/js/markasread.js"></script>
<!-- end markasread -->

</body>

</html>