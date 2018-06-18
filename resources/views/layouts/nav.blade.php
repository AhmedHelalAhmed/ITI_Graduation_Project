<nav class="navbar navbar-expand-lg navbar-dark bg-dark
 fixed-top">
    <a class="navbar-brand " href="{{ url('/') }}">Commons</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link active" href="#">Home<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('info.index') }}">Rumors</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('questions.index') }}">Questions</a>
            </li>
        </ul>

        <ul class="navbar-nav">


            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search">
                </form>
            </li>


            @guest
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
            @else

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <img class="avatar" src="{{ asset('storage/images/avatars/'.Auth::user()->avatar ) }}"
                             alt="avatar image"/>
                    </a>


                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item disabled" href="#">{{ Auth::user()->name }}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Friends</a>
                        <a class="dropdown-item" href="{{ url('/profile') }}">My profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">My categories</a>


                        <a class="dropdown-item" href="#">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Log out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>

                </li>

                {{--<input class="btn btn-outline-success my-2 my-sm-0" value="add Rumor" type="submit"/>--}}
            @endguest


        </ul>


    </div>
</nav>



