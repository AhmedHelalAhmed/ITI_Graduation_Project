@extends('layouts.app')

@section('title')
    <title>{{ config('SHAA3At', 'SHAA3At') }}</title>
@endsection

@section('style')
    <!-- Start custom style -->
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <!-- End custom style -->



    <!-- Start Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic"
          rel="stylesheet" type="text/css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" media="all"
          type="text/css"/>
    <!-- End Custom Fonts -->


    <!-- for contact us -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- for contact us -->
    <!-- csrfToken -->
    <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <!-- csrfToken -->
@endsection

@section('content')
    <!-- Start Main Content -->
    <main>

        <header class="masthead text-center text-white d-flex">
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <h1 class="text-uppercase">
                            <strong>Your Source of Rumors</strong>
                        </h1>
                        <hr>
                    </div>
                    <div class="col-lg-8 mx-auto">
                        <p class="text-faded mb-5">SHAA3AT can help you to know rumors to be aware of it and make you share in the process of marking the information is just a rumor!</p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#services">Find Out More</a>
                    </div>
                </div>
            </div>
        </header>
    </main>
    <!-- End Main Content -->
    <!-- Services -->
    <section class="content-section bg-primary text-white text-center md-5" id="services">
        <div class="container">
            <div class="content-section-heading">
                <h3 class="text-secondary mb-0">Services</h3>
                <h2 class="mb-5">What We Offer</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-screen-smartphone"></i>
            </span>
                    <h4>
                        <strong>Reading</strong>
                    </h4>
                    <p class="text-faded mb-0">Read rumors to be aware of it and spread the knowledge.</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-pencil"></i>
            </span>
                    <h4>
                        <strong>Write</strong>
                    </h4>
                    <p class="text-faded mb-0">Write rumors to stop it and tell people about it.</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-like"></i>
            </span>
                    <h4>
                        <strong>Rate</strong>
                    </h4>
                    <p class="text-faded mb-0">Rate Rumors to enhance people knowledge and stop the rumor from spread
                        <i class="fa fa-heart"></i>
                        </p>
                </div>
                <div class="col-lg-3 col-md-6">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-mustache"></i>
            </span>
                    <h4>
                        <strong>Ask</strong>
                    </h4>
                    <p class="text-faded mb-0">Ask a question to ensure of the information you have...</p>
                </div>
            </div>
        </div>
    </section>




    <!-- Portfolio -->
    <section class="content-section" id="portfolio">
        <div class="container">
            <div class="content-section-heading text-center">
                <h3 class="text-secondary mb-0">Rumors</h3>
                <h2 class="mb-5">Recent Rumors</h2>
            </div>
            <div class="row no-gutters">


                @foreach( $info as $info_element)

                    <div class="col-lg-6">
                        <a class="portfolio-item" href="/info/{{ $info_element->id }}">
              <span class="caption">
                <span class="caption-content">
                  <h2>{{ $info_element->title }}</h2>

                  <p class="mb-0">{{  substr($info_element->body, 0, 80) }}</p>
                </span>
              </span>
                            <img class="img-fluid" src=" {{ asset('storage/images/'.$info_element->cover) }}"
                                 alt="cover image">
                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    </section>









    <!-- History -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">بعض الشائعات المشهورة</h2>
                    <h3 class="section-subheading text-muted">شائعات فى مصر.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="img/about/1.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">

                                    <h4 class="subheading">عادل إمام</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">في فترة تشبه هذه الأيام التي يتعرض فيها الاقتصاد المصري لأزمات متتالية، وتكثر فيها الديون على الدولة، ظهرت شائعة بأن النجم الكبير عادل إمام، مليارديرًا، وأنه بما يملكه من أموال طائلة قدم عرضا للحكومة، بأن يسدد جميع ديون مصر من أمواله الخاصة، شريطة أن توضع صورته على الجنيه المصري، بدلاً من رمسيس وتوت عنخ آمون.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="img/about/2.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">

                                    <h4 class="subheading"> أمنا الغولة</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">توارثت الأجيال، والأمهات تحديدا فكرة ترهيب أبنائهن بشخصيات خيالية، لها أسماء مرعبة، من شأنها أن تبث الرعب في قلوب الصغار إذا لم ينفذوا أمرا أو تأخروا عن تنفيذ الواجبات المدرسية على سبيل المثال، وكان من بين هذه الشخصيات الخرافية «أمنا الغولة»، و«أبو رجل مسلوخة»، وكلاهما توحي اسمائهما بشبحٍ ينتظرك في مكان ما، سيلتهمك، أو يكفي أن تشاهد وجهه القبيح لتخشى النوم ما تبقى من حياتك.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="img/about/3.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading">اللانشون</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">في يوم من الأيام، استيقظت عدد من الأمهات على خبر يشير إلى وجود حالات تسمم بين أغلب طلاب مدارس الجمهورية بسبب «اللانشون»، وقتها هرول الجميع في محاولة لانقاذ ابنه من الكارثة، وصارت حملة ضخمة ضد شركات تصنيع اللانشون في مصر، استمرت فترة لا بأس بها، لكن الشائعة الأكبر التي خرجت وقتها وكانت كالقشة التي قسمت ظهر البعير، هي تداول الأسر بينها وبين بعضها، أن الفئران تسكن ماكينات فرم لحوم اللانشون، وتفرم معها، حتى أن بعض الأشخاص زادوا على الشائعة بأنهم وجدوا زيلاً لفأر داخل «كوز اللانشون».</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="img/about/4.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading">دباديب تتحول إلى عفاريت</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">روجت وسائل الإعلام في سنة من السنين قصة سيدة عاشت مع شبح في منزل واحد، وبالفعل استضافت بعض البرامج تلك السيدة التي بدأت تسرد حكايات أقرب لأفلام «هيتشكوك» المرعبة، بأنها ذات يوم عادت من بيتها وجدت دُبًا لعبة أحضرته لابنتها في مناسبة من المناسبات، وجدته واقفًا داخل مطبخها، يطهو بعض الطعام، وفور دخولها عليه ألقى بالإناء ساخنًا في وجهها، وهرب.

                                        وقتها، تناقلت البرامج الشائعة على إنها حقيقة مدوية، وحذرت من شراء بعض العرائس اللعبة من أماكن مجهولة الهوية، حيث أن بعضها محشو بقطن وأقمشة استخدمت كفنًا للأموات، أو مات عليها شخص، مما يجعل روحه حاضرة فيها.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>و الكثير من
                                    <br>الشائعات
                                    <br>قادمة!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>




    <!-- Contact -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="contactForm" name="sentMessage"  method="POST" novalidate="novalidate">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ csrf_field() }}
                                    <input class="form-control" id="name" type="text"  placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="email"  type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="phone"  type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control"  id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



@endsection

@section('include_files_body')




    <!-- Contact form JavaScript -->
    <script src="{{ asset('/js/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('/js/contact_me.js') }}"></script>
    <!-- Contact form JavaScript -->

@endsection


