@extends('layouts.app')

@section('title')
    <title>Rumors</title>
@endsection


@section('style')
    <!-- Start style -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- End Style -->

    <!-- Start info-index -->
    <link href="{{ asset('css/info-index.css') }}" rel="stylesheet">
    <!-- End info-index -->
@endsection



@section('content')
    <div class="Rumors">
        <section class="container">
            <h3>Rumors</h3>
            <a class="btn btn-success" href="/info/create">Add Rumor</a>
            @if (isset($info))
            <div class="row">
                    @foreach ($info as $info_element)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img id='cover-image' class="card-img-top"
                                     data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                                     alt="cover" style="height: 225px; width: 100%; display: block;"
                                     src="{{ asset('storage/images/'.$info_element->cover) }}"
                                     data-holder-rendered="true"
                                     data-toggle="tooltip" data-placement="top" title="{{ $info_element->title }}">
                                <div class="card-body">

                                    <p class="card-text">{{   substr($info_element->body, 0, 100) }} . . . </p>
                                    <a href="/info/{{ $info_element->id }}">Read more</a>
                                    <!-- Start Rate -->
                                    @auth
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group" id="{{ $info_element->id }}">
                                                <button type="button"
                                                        class="btn btn-sm btn-outline-warning vote">{{ Auth::user()->votes()->where('article_id', $info_element->id)->first() ? Auth::user()->votes()->where('article_id', $info_element->id)->first()->vote == 1 ? 'You up this article' : 'Up' : 'Up'  }}</button>

                                                <button type="button"
                                                        class="btn btn-sm btn-outline-danger vote">{{ Auth::user()->votes()->where('article_id', $info_element->id)->first() ? Auth::user()->votes()->where('article_id', $info_element->id)->first()->vote == 0 ? 'You Down this article' : 'Down' : 'Down'  }}</button>
                                            </div>
                                        </div>
                                @endauth
                                <!-- end Rate -->

                                    <small class="text-muted">
                                        <time datatime="{{  $info_element->created_at }}">
                                            {{ Carbon\Carbon::parse($info_element->created_a)->toDayDateTimeString() }}
                                        </time>
                                    </small>
                                </div>
                            </div>


                        </div>
                    @endforeach


            </div>

            <!-- Start Pagination -->
            <div aria-label="Page navigation" class="rumors-pagination">
                {{ $info->links('pagination.default') }}
            </div>
            <!-- End Pagination -->
            @endif

        </section>
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

@endsection