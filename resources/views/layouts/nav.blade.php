<nav id="mainNav" class=' navbar-dark bg-light navbar-fixed-top' style="font-size: 25px; float: left">


    <button class="navbar-toggler hidden-sm-up light float-xs-right" type="button" data-toggle="collapse"
            data-target="#minimenu"></button>


    <article id="minimenu" class="collapse navbar-toggleable-xs">

        <ul class="nav navbar-nav">



            <span class="authentication-menu-links" style="float: left;">
            <!-- Authentication Links -->

                @guest
                    <li class="nav-item">



                        <a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a>



                    </li>
                    <li class="nav-item">


                        <a class="nav-link"
                           href="{{ route('register') }}">التسجيل</a>




                    </li>
                @else
                    <li class="nav-item dropdown" style="position: relative; padding-left: 50px;">

                    <img src="/storage/images/avatars/{{ Auth::user()->avatar }}"
                         style="width: 32px;height: 32px; position: absolute; top: 6px; left:10px; border-radius: 50%"/>

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}

                    </a>


                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                        <a class="dropdown-item" href="{{ url('/profile') }}">
                            الملف الشخصى
                        </a>


                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            تسجيل الخروج
                        </a>


                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>


                    </div>



                        </li>


                    </span>

            @endguest


        </ul>
        <ul class="nav navbar-nav">


            <li class="nav-item" style="padding-left: 53%">
                <a class="nav-link" href="{{ route('info.index') }}" style="float: right ">اسال</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('info.index') }}" style="float: right "> معلومات واخبار</a>
            </li>

            <li class="nav-item " >
                <a class="nav-link" href="{{ route('info.index') }}" style="float: right ">العام</a>


            <li class="nav-item ">
                <a class="navbar-brand" href="{{  url('/') }} ">
                    <img src='{{ asset('storage/images/'.'اشاعات.jpg') }}' class="logo"
                         style="  ;height: 50px;width: 150px;border-radius: 10px;float: right;position: absolute"/>
                </a>


            </li>


        </ul>


    </article>

</nav>















