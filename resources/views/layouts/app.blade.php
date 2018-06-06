<!DOCTYPE html>
<html>
<head>
    @include('layouts.head')
</head>

<body>

@include('layouts.nav')

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
