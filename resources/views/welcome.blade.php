@extends('layouts.app')

@section('title')
    <title>{{ config('Rumors', 'Rumors') }}</title>
@endsection

@section('style')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Start Main Content -->
    <main>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
                <!-- Start Nav for slider -->
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <!-- End Nav for slider -->
            </ol>
            <div class="carousel-inner">
                <!-- Start Slide 1 -->
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('media/images/1.png') }}" alt="First slide">

                    <div class="carousel-caption d-none d-md-block">
                        <h1>Share</h1>
                        <p>the rumors you know and save people form rumors</p>
                        <p>ask about rumers and about anything else to be sure</p>
                    </div>
                </div>
                <!-- End Slide 1 -->

                <!-- Start Slide 2 -->
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('media/images/2.png')}}" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Make</h1>
                        <p>friends and follow what the people write</p>
                    </div>
                </div>
                <!-- End Slide 2 -->



                <!-- Start slide 3 -->
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('media/images/7.png')}}" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>read</h1>
                        <p>read the rumors and tell people about it to prevent the rumors </p>

                    </div>
                </div>
            </div>
            <!-- End slide 3 -->

            <!-- Start Controllers -->
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!-- End Controllers -->
        </div>
    </main>
    <!-- End Main Content -->

@endsection

