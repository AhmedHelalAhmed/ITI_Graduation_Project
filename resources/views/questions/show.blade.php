@extends('info.show')


@section('title')
    <title>{{ $question->title }}</title>
@endsection



@section('content')
    <div class="publishes container">
        <article>
            <header>
                <!-- Start Title -->
                <h1 class="mt-4"> {{ $question->title }} </h1>
                <!-- End Title -->

                <!-- Start Author -->
                <p class="lead">
                    By
                    <a href="#">{{$question->user->name}}</a>
                </p>
                <!-- End Author -->
            </header>
            <hr>
            <section>

                <!-- Start Date/Time -->
                <p>Published on
                    <time datatime="{{  $question->created_at }}">
                        {{ Carbon\Carbon::parse($question->created_at)->toDayDateTimeString() }}
                    </time>
                </p>
                <!-- End Date/Time -->

                <hr>

                <!-- Start Image -->
                <img class="img-fluid rounded Responsive image" src="{{ asset('storage/images/'.$question->cover) }}"
                     alt="cover">
                <!-- End Image -->

                <hr>


                <!-- Start Article Content -->
                <span class="article-body">
                    {{$question->body}}
                </span>
                <!-- Start Article Content -->
                <hr>
                <!-- Start Tags -->
                <span class="tags">
                    @foreach($question->tags as $tag)
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
                        <div class="btn-group" id="{{ $question->id }}">
                            <button type="button"
                                    class="btn btn-sm btn-outline-warning vote">{{ Auth::user()->votes()->where('article_id', $question->id)->first() ? Auth::user()->votes()->where('article_id', $question->id)->first()->vote == 1 ? 'You up this article' : 'Up' : 'Up'  }}</button>


                            <button type="button"
                                    class="btn btn-sm btn-outline-danger vote">{{ Auth::user()->votes()->where('article_id', $question->id)->first() ? Auth::user()->votes()->where('article_id', $question->id)->first()->vote == 0 ? 'You Down this article' : 'Down' : 'Down'  }}</button>
                        </div>
                    </div>
            @endauth

            <!-- End Rate  -->
            </section>


            <section class="container">
                <!-- Start share with social media -->
                <a class="share facebook" target="_blank"
                   href="https://www.facebook.com/sharer/sharer.php?u={{ url('/').'/info/'. $question->id }}">
                    <i class="fa fa-facebook"></i>
                </a>

                <a class="share gplus" target="_blank"
                   href="https://plus.google.com/share?url={{ url('/').'/info/'. $question->id  }}">
                    <i class="fa fa-google-plus"></i>
                </a>

                <a class="share twitter" target="_blank"
                   href="https://twitter.com/intent/tweet?url={{ url('/').'/info/'. $question->id  }}">
                    <i class="fa fa-twitter"></i>
                </a>

                <a class="share linkedin" target="_blank"
                   href="https://www.linkedin.com/shareArticle?mini=true&url={{ url('/').'/info/'. $question->id  }}&title={{ $question->title }}
                           &summary={{ $question->title }}&source={{ url('/') }}"><i class="fa fa-linkedin"></i></a>
                <!-- End share with social media -->
            </section>
            <hr>
            <section>
                <!-- Start Comments  -->
            @include('laravelLikeComment::comment', ['comment_item_id' => $question->id ])
            <!-- End Comments  -->
            </section>
        </article>
    </div>
@endsection

