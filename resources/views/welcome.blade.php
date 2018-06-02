<!DOCTYPE html>

<html>
<head>
    @include('layouts.head')
</head>

<body data-spy="scroll" data-target="#minimenu">
<nav id="mainNav" class='navbar navbar-full navbar-dark bg-light navbar-fixed-top'>
    <button class="navbar-toggler hidden-sm-up light float-xs-right" type="button" data-toggle="collapse"
            data-target="#minimenu"></button>
    <article id="minimenu" class="collapse navbar-toggleable-xs">
        <ul class="nav navbar-nav">
            <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
            <li class="nav-item"><a class="nav-link" href="#recent_info">Recent info</a></li>
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @else
                <li class="nav-item dropdown">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                        {{ Auth::user()->name }} <span class="caret"></span>

                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </article>
</nav>

<header class="htop">
    <div class="container">
        <h1>Active social</h1>
        <hr>
        <p>
            The One Place to be sure the information, news you have is correct
        </p>
    </div>
</header>


<section id="about" class="msection">
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-xs-center">
                <h3>Share</h3>
                <p>Your experience and gain the experience</p>
            </div>
            <div class="col-md-3 text-xs-center">
                <h3>Ask</h3>
                <p>people to get answer and gain knowledge</p>
            </div>
            <div class="col-md-3 text-xs-center">
                <h3>Rate</h3>
                <p>any news or information you see, approve or disapprove it</p>
            </div>
            <div class="col-md-3 text-xs-center">
                <h3>Make friends
                </h3>
                <p>add other users as friend and enlarge your community</p>
            </div>

        </div>

        <div class="row mt-4">
            <div class="col-md-12 note">
                <p>You can share your experience and information.</p>
                <p>You can approve and disapprove the news, information from the other people.</p>
                <p>You can ask questions to get answer.</p>
                <p>You can make friends and Chat with them.</p>
                <p>You can share any article through social media.</p>
                <p>You can can rate any user.</p>
            </div>
        </div>
    </div>
</section>


<section id="recent_info" class="msection container">
        <div class="row">
            <div class="col-md-12 text-xs-center">
                <h1>Recent Info</h1>
            </div>
        </div>
        <div class="row">
            @foreach ($info as $info_element)
                <div class="col-md-4 text-xs-center">
                    <div class="card">
                        <div class="card-block">
                            <a class="card-title" href="/info/{{ $info_element->id }}">{{ $info_element->title }}</a>
                        </div>
                        <a class="card-title" href="/info/{{ $info_element->id }}"><img
                                    src="{{ asset('storage/images/'.$info_element->cover) }}"
                                    style="height:600;width:600;" class="img-fluid"/></a>
                        <div class="card-block">
                            <strong class="text-gray-dark">@ {{  $info_element->user->name }}</strong>
                            <p class="card-text">{{  $info_element->body }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</section>



<footer class="text-xs-center footerA" style="background-color: black">
    <div class="container">
        Copyright ITI
    </div>
</footer>

@include('layouts.libraries')
<script>
    $(document).ready(function () {
        $('.nav-link').on('click', function (e) {
            if (this.hash) {
                e.preventDefault();
                var hash = this.hash;
                $('html, body').animate({scrollTop: $(hash).offset().top}, 1000, function () {
                    window.location.hash = hash;
                });
            }
        });
    });
</script>
</body>
</html>
