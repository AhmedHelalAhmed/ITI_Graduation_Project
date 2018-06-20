<div class="publishes container">
    @if(isset($info))
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
                    {{ Carbon\Carbon::parse($info->created_at)->toDayDateTimeString() }}
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
                        <a href="{{ url('/tags/'.$tag->id) }}" class="btn-secondary rounded mr-2 p-2">{{ '#'.$tag->name }}</a>
                        @endforeach
                </span>
            <!-- Start Tags -->
        </section>

        <hr>
        <section class="container">
            <!-- Start Rate  -->
            @auth
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="badge badge-success">{{ \App\Vote::all()->where("article_id","==",$info->id )->where("vote",'=',1)->count() }}</span>
                    <span class="badge badge-danger">{{ \App\Vote::all()->where("article_id","==",$info->id )->where("vote",'=',0)->count() }}</span>
                </div>
                <div id="{{ $info->id }}">
                    <button type="button"
                            class="btn btn-sm btn-outline-success vote">{{ Auth::user()->votes()->where('article_id', $info->id)->first() ? Auth::user()->votes()->where('article_id', $info->id)->first()->vote == 1 ? '-' : '+1' : '+1'  }}</button>


                    <button type="button"
                            class="btn btn-sm btn-outline-danger vote">{{ Auth::user()->votes()->where('article_id', $info->id)->first() ? Auth::user()->votes()->where('article_id', $info->id)->first()->vote == 0 ? '+' : '-1' : '-1'  }}</button>
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
    @endif
</div>