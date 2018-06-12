@extends('layouts.app')


@section('title')
    <title>{{ $info->title }}</title>
@endsection



@section('style')
    <!-- Start Style -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- End Style -->

    <!-- Start info-index -->
    <link href="{{ asset('css/info-show.css') }}" rel="stylesheet">
    <!-- End info-index -->


    <!-- Start Font Awesome -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!-- End Font Awesome -->


    <!-- Start Comment -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/icon.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/comment.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/form.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/button.min.css" rel="stylesheet">
    <link href="{{ asset('/vendor/laravelLikeComment/css/style.css') }}" rel="stylesheet">
    <!-- End Comment -->




@endsection






@section('content')
    <div class="publishes container">
        <article>
            <header>
                <!-- Start Title -->
                <h1 class="mt-4"> {{ $info->title }} </h1>
                <!-- End Title -->

                <!-- Start Author -->
                <p class="lead">
                    By
                    <a href="#">{{$info->user->name}}</a>
                </p>
                <!-- End Author -->
            </header>
            <hr>
            <section>

                <!-- Start Date/Time -->
                <p>Published on
                    <time datatime="{{  $info->created_at }}">
                        {{ Carbon\Carbon::parse($info->created_a)->toDayDateTimeString() }}
                    </time>
                </p>
                <!-- End Date/Time -->

                <hr>

                <!-- Start Image -->
                <img class="img-fluid rounded Responsive image" src="{{ asset('storage/images/'.$info->cover) }}"
                     alt="cover">
                <!-- End Image -->

                <hr>


                <!-- Start Article Content -->
                <span class="article-body">
                    {{$info->body}}
                </span>
                <!-- Start Article Content -->
                <hr>
                <!-- Start Tags -->
                <span class="tags">
                    @foreach($info->tags as $tag)
                        <a href="#" class="btn-secondary rounded mr-2 p-2">{{ '#'.$tag->name }}</a>
                        @endforeach
                </span>
                <!-- Start Tags -->
            </section>

            <hr>
            <section class="container">
                <!-- Start Rate  -->
                @auth
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group" id="{{ $info->id }}">
                            <button type="button"
                                    class="btn btn-sm btn-outline-warning vote">{{ Auth::user()->votes()->where('article_id', $info->id)->first() ? Auth::user()->votes()->where('article_id', $info->id)->first()->vote == 1 ? 'You up this article' : 'Up' : 'Up'  }}</button>


                            <button type="button"
                                    class="btn btn-sm btn-outline-danger vote">{{ Auth::user()->votes()->where('article_id', $info->id)->first() ? Auth::user()->votes()->where('article_id', $info->id)->first()->vote == 0 ? 'You Down this article' : 'Down' : 'Down'  }}</button>
                        </div>
                    </div>
            @endauth

            <!-- End Rate  -->
            </section>


            <section class="container">
                <!-- Start share with social media -->
                <a class="share facebook" target="_blank"
                   href="https://www.facebook.com/sharer/sharer.php?u={{ url('/').'/info/'. $info->id }}">
                    <i class="fa fa-facebook"></i>
                </a>

                <a class="share gplus" target="_blank"
                   href="https://plus.google.com/share?url={{ url('/').'/info/'. $info->id  }}">
                    <i class="fa fa-google-plus"></i>
                </a>

                <a class="share twitter" target="_blank"
                   href="https://twitter.com/intent/tweet?url={{ url('/').'/info/'. $info->id  }}">
                    <i class="fa fa-twitter"></i>
                </a>

                <a class="share linkedin" target="_blank"
                   href="https://www.linkedin.com/shareArticle?mini=true&url={{ url('/').'/info/'. $info->id  }}&title={{ $info->title }}
                           &summary={{ $info->title }}&source={{ url('/') }}"><i class="fa fa-linkedin"></i></a>
                <!-- End share with social media -->
            </section>
            <hr>
            <section>
                <!-- Start Comments  -->
            @include('laravelLikeComment::comment', ['comment_item_id' => $info->id ])
            <!-- End Comments  -->
            </section>
        </article>
    </div>
@endsection


@section('sidebar')
    @include('layouts.sidebar')
@endsection


@section('include_files_body')
    <!-- Start Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- End Jquery -->

    <!-- Start Share -->
    <script src="{{ asset('/js/social-share.js') }}"></script>
    <!-- End Share -->

    <!-- Start Rate -->
    <script>
        var token = '{{ Session::token() }}';
        var urlvote = '{{ route('vote') }}';
    </script>
    <script src="{{ asset('/js/vote.js') }}"></script>
    <!-- End Rate -->

    <!-- Start Comment -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="{{ asset('/vendor/laravelLikeComment/js/script.js') }}" type="text/javascript"></script>
    <!-- End Comment -->

@endsection