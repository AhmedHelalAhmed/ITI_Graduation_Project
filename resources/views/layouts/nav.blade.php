<nav id="mainNav" class='navbar navbar-full navbar-dark bg-light navbar-fixed-top'>
    <button class="navbar-toggler hidden-sm-up light float-xs-right" type="button" data-toggle="collapse"
            data-target="#minimenu"></button>
    <article id="minimenu" class="collapse navbar-toggleable-xs">

        <ul class="nav navbar-nav">
            <li class="nav-item"><a class="navbar-brand" href="{{  url('/') }} ">Active social</a></li>

            <li class="nav-item"><a class="nav-link" href="{{ route('info.index') }}">Information</a></li>

            <span class="authentication-menu-links" style="float: right;">
            <!-- Authentication Links -->
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li class="nav-item"><a class="nav-link"
                                            href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                    <li class="nav-item dropdown" style="position: relative; padding-left: 50px;">

                    <img src="/storage/images/avatars/{{ Auth::user()->avatar }}"
                         style="width: 32px;height: 32px; position: absolute; top: 6px; left:10px; border-radius: 50%"/>

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                        <a class="dropdown-item" href="{{ url('/profile') }}">
                            Profile
                        </a>


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
                    </span>
            </li>
            @endguest
        </ul>
    </article>
</nav>