<!DOCTYPE html>
<html>
<head>
    @include('layouts.head')
</head>

<body>
<nav id="mainNav" class='navbar navbar-full navbar-dark bg-light navbar-fixed-top'>
    <button class="navbar-toggler hidden-sm-up light float-xs-right" type="button" data-toggle="collapse"
            data-target="#minimenu"></button>
    <article id="minimenu" class="collapse navbar-toggleable-xs">

        <ul class="nav navbar-nav">
            <li class="nav-item"><a class="navbar-brand" href="{{  url('/') }} ">Active social</a></li>

            <li class="nav-item"><a class="nav-link" href="{{ route('info.index') }}">Information</a></li>
        </ul>
    </article>
</nav>


<header class="htop">

    <div class="container">
        <h1>Active social</h1>
        <hr>
        <p>
            يمكنك أن

        </p>
        <p>
            تنشر معلوماتك و تجاربك و الأخبار التى تريد نشرها

        </p>
        <p>
            طرح أسئلة

        </p>
        <p>
             تقييم ما يقدمه الاعضاء الآخرين

        </p>
        <p>
            تقييم الموضوع و التعليق عليه

        </p>
    </div>
</header>


@yield('content')

<footer class="text-xs-center footerA">
    Copyright ITI
</footer>
@include('layouts.libraries')
</body>
</html>
