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
            <a class="btn btn-success" href="/info/create">Add Rumbor</a>
            <div class="row">
                @foreach ($info as $info_element)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"
                                 data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                                 alt="cover" style="height: 225px; width: 100%; display: block;"
                                 src="{{ asset('storage/images/'.$info_element->cover) }}" data-holder-rendered="true"
                                 data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                            <div class="card-body">

                                <p class="card-text">{{   substr($info_element->body, 0, 100) }} . . . </p>
                                <a href="/info/{{ $info_element->id }}">Read more</a>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group" id="{{ $info_element->id }}">

                                        <button type="button"
                                                class="btn btn-sm btn-outline-secondary vote">{{ Auth::user()->votes()->where('article_id', $info_element->id)->first() ? Auth::user()->votes()->where('article_id', $info_element->id)->first()->vote == 1 ? 'You Vote up to this article' : 'Up' : 'Up'  }}
                                        </button>

                                        <button type="button"
                                                class="btn btn-sm btn-outline-secondary vote">{{ Auth::user()->votes()->where('article_id', $info_element->id)->first() ? Auth::user()->votes()->where('article_id', $info_element->id)->first()->vote == 0 ? 'You vote Down to this article' : 'Down' : 'Down'  }}
                                        </button>
                                    </div>

                                    {{--<div class="social_media">--}}

                                    {{--</div>--}}



                                </div>

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
            <div class="container">
                <nav aria-label="Page navigation">
                    {{ $info->links('pagination.default') }}
                </nav>
            </div>
            <!-- End Pagination -->


        </section>
    </div>


    <script>

        var popupMeta = {
            width: 400,
            height: 400
        }

        $(document).on('click', '.social-share', function (event) {
            event.preventDefault();

            var vPosition = Math.floor(($(window).width() - popupMeta.width) / 2),
                hPosition = Math.floor(($(window).height() - popupMeta.height) / 2);

            var url = $(this).attr('href');
            var popup = window.open(url, 'Social Share',
                'width=' + popupMeta.width + ',height=' + popupMeta.height +
                ',left=' + vpPsition + ',top=' + hPosition +
                ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

            if (popup) {
                popup.focus();
                return false;
            }
        });
    </script>

    <!-- rate -->
    <script>
        var token = '{{ Session::token() }}';
        var urlvote = '{{ route('vote') }}';
    </script>
    <script src="{{ asset('/js/vote.js') }}"></script>

@endsection



@section('sidebar')
    @include('layouts.sidebar')
@endsection