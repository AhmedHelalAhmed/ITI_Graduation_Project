@extends('info.index')

@section('title')
    <title>Questions</title>
@endsection




@section('content')
    <div class="Rumors">
        <section class="container">
            <h3>Questions</h3>


            <div class="round-button" id="mybutton">

                <a class="round-button round-button-circle" href="/questions/create">+</a>
            </div>


            <div class="row">
                @foreach ($questions as $question)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img id='cover-image' class="card-img-top"
                                 data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                                 alt="cover" style="height: 225px; width: 100%; display: block;"
                                 src="{{ asset('storage/images/'.$question->cover) }}"
                                 data-holder-rendered="true"
                                 data-toggle="tooltip" data-placement="top" title="{{ $question->title }}">
                            <div class="card-body">

                                <p class="card-text">{{   substr($question->body, 0, 100) }} . . . </p>
                                <a href="/questions/{{ $question->id }}">Read more</a>
                                <!-- Start Rate -->
                                @auth
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="badge badge-success">{{ \App\Vote::all()->where("article_id","==",$question->id )->where("vote",'=',1)->count() }}</span>
                                            <span class="badge badge-danger">{{ \App\Vote::all()->where("article_id","==",$question->id )->where("vote",'=',0)->count() }}</span>
                                        </div>
                                        <div id="{{ $question->id }}">

                                            <button type="button"
                                                    class="btn btn-sm btn-outline-success vote">{{ Auth::user()->votes()->where('article_id', $question->id)->first() ? Auth::user()->votes()->where('article_id', $question->id)->first()->vote == 1 ? '-' : '+1' : '+1'  }}</button>

                                            <button type="button"
                                                    class="btn btn-sm btn-outline-danger vote">{{ Auth::user()->votes()->where('article_id', $question->id)->first() ? Auth::user()->votes()->where('article_id', $question->id)->first()->vote == 0 ? '+' : '-1' : '-1'  }}</button>
                                        </div>
                                    </div>
                            @endauth
                            <!-- end Rate -->

                                <small class="text-muted">
                                    <time datatime="{{  $question->created_at }}">
                                        {{ Carbon\Carbon::parse($question->created_at)->toDayDateTimeString() }}
                                    </time>
                                </small>
                            </div>
                        </div>


                    </div>
                @endforeach
            </div>

            <!-- Start Pagination -->
            <div aria-label="Page navigation" class="rumors-pagination">
                {{ $questions->links('pagination.default') }}
            </div>
            <!-- End Pagination -->


        </section>
    </div>


@endsection


