<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark
 fixed-top">
        <a class="navbar-brand " href="{{ url('/') }}"><img src="{{ asset('media/logo.png') }}" alt="SHAA3AT" id="logo"
                                                            style="width: 55px;height: 55px;border-radius: 20%"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/home') }}">Home<span class="sr-only">(current)</span></a>
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
                <form class="form-inline my-2 my-lg-0" action="/search" method="POST" role="search">
{{ csrf_field() }}
                <input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search" name="q">
                </form>

                </li>


                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @else



                <!-- Start notification -->
                    <li class="nav-item dropdown" onclick="markNotificationsAsRead({{ count(auth()->user()->unreadNotifications) }})">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <span class="glyphicon glyphicon-globe"></span> Notifications <span
                                    class="badge badge-light">{{ count(auth()->user()->unreadNotifications) }}</span>


                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                            @forelse( auth::user()->unreadNotifications as $notification)

                                @if($notification->data['article']['type_id']==1 )


                                    <a class="dropdown-item"
                                       href="{{ url('info/'.$notification->data['article']['id']) }}">

                                        {{ $notification->data['user']['name'] }} comment
                                        on {{ $notification->data['article']['title'] }}
                                    </a>


                                @else

                                    <a class="dropdown-item"
                                       href="{{ url('questions/'.$notification->data['article']['id']) }}">

                                        {{ $notification->data['user']['name'] }} comment
                                        on {{ $notification->data['article']['title'] }}
                                    </a>

                                @endif
                                <div class="dropdown-divider"></div>
                            @empty
                                <a class="dropdown-item" href="#">
                                    No unread Notifications
                                </a>

                            @endforelse
                        </div>

                    </li>
                    <!-- end notification -->

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <img class="avatar" src="{{ asset('storage/images/avatars/'.Auth::user()->avatar ) }}"
                                 alt="avatar image"/>
                        </a>


                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item disabled"
                               href="#">{{ Auth::user()->name }}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('/profile') }}">My profile</a>
                            <div class="dropdown-divider"></div>


                            <a class="dropdown-item" href="{{ url( '/users/'. Auth::user()->id ) }}">
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



                    <a class="btn btn-outline-success my-2 my-sm-0" href="{{ url('/') }}">

                        <span style="font-size: 1.5em;">&#128363;</span>

                    </a>
                @endguest


            </ul>


        </div>
    </nav>


</div>