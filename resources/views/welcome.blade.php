<!DOCTYPE html>

<html>
<head>
    @include('layouts.head')
</head>

<body data-spy="scroll" data-target="#minimenu">
@include('layouts.nav')


<header class="htop">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">

                <img class="d-block w-100"
                     src="https://www.planwallpaper.com/static/images/violet-vector-leaves-circles-backgrounds-for-powerpoint_PdfkI4q.jpg"
                     alt="First slide" style="height:300px">

                <div class="carousel-caption d-none d-md-block">

                    <h1> شارك</h1>
                    <p>
                        شارك من خلال تقييم الاخبار و المعلومات التى يطرحها الاعضاء و التى تنشر على الموقع
                    </p>
                    <p>
                        اسال و الاعضاء تجيبك
                    </p>

                </div>
            </div>
            <div class="carousel-item">

                <img class="d-block w-100"
                     src="https://images.pexels.com/photos/255379/pexels-photo-255379.jpeg?auto=compress&cs=tinysrgb&h=350"
                     alt="Second slide" style="height:300px">
                <div class="carousel-caption d-none d-md-block">
                    <h1> اقرا</h1>
                    <p>
                        أقراء المقالات والمعلومات التى تنشر
                    </p>

                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100"
                     src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBD-TdJf-8wGqupsI-jvH9tgyJa-DFLlM6sfvEyKJF_ZVQM-Gu"
                     alt="Third slide" style="height:300px">
                <div class="carousel-caption d-none d-md-block">
                    <h1> كون</h1>
                    <p>
                        صداقات و تابع اعضاء آخرين
                    </p>

                </div>
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
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
    <div class="row card">
        @foreach ($info as $info_element)

            <div class="card-body col-md-4" style="padding-right: 1%; text-align: right;">
                <strong class="d-inline-block text-primary">{{  $info_element->category->name }}</strong>
                <h3 class="mb-0">
                    <a class="text-dark" href="/info/{{ $info_element->id }}">{{  $info_element->title }}</a>
                </h3>
                <div class="mb-1 text-muted">{{  $info_element->created_at }}</div>
                <p class="card-text mb-auto">{{ $info_element->body }}</p>
                <a href="/info/{{ $info_element->id }}">اقرا المزيد</a>
            </div>

            <div class="card-body col-md-2" style="padding: 0%;">
                <img class="card-img-right flex-auto d-none d-lg-block img-thumbnail" alt="Thumbnail"
                     style="width: 200px; height: 250px;"
                     src="{{ asset('storage/images/'.$info_element->cover) }}" data-holder-rendered="true"/>
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
