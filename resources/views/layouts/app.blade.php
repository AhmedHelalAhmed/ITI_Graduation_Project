<!DOCTYPE html>
<html>
<head>
    @include('layouts.head')
</head>

<body>
@include('layouts.nav')

{{--<header class="htop">--}}

    {{--<div class="container">--}}
   {{----}}
    {{--</div>--}}
{{--</header>--}}


@yield('content')

<footer class="text-xs-center footerA">
    Copyright ITI
</footer>
@include('layouts.libraries')
</body>
</html>
