@extends('layouts.app')

@section('content')

    <div class="container " style="padding:0;   margin-top: 100px;width: 80%;-webkit-box-shadow: 0px 0px 65px 10px rgba(255,0,0,0.64);
-moz-box-shadow: 0px 0px 65px 10px rgba(255,0,0,0.64);
box-shadow: 0px 0px 65px 10px rgba(255,0,0,0.64); text-align: right">
        <div class="media text-center" style="border: 3px solid #000000; padding: 6px;">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <img class="mr-3" src="{{ asset('storage/images/avatars/'.$info->user->avatar) }}"
                     style="width: 64px;height: 64px; border-radius: 50%"/>
                <strong class="d-block text-gray-dark"
                        style="position: relative;right: 50px;">@ {{$info->user->name}}</strong>
            </p>

            <h2 class="mt-0" style="text-align: center;position: relative;top: 30px">{{  $info->title }}</h2>
            <hr style="border:  3px black solid ;width: 50%;position: relative;top: 20px;"/>
            <div class="container text-center" style="border: 2px solid green; padding: 10%;border-style: dotted ">
<img src="{{ asset('storage/images/'.$info->cover) }}" />
                {{$info->body}}

            </div>


            <div class="container" style="text-align: center">

                <!-- for rate the article -->

                @auth
                    <div id="{{ $info->id }}" style="display: inline;">
                        <button
                                class="btn btn-xs btn-warning vote">{{ Auth::user()->votes()->where('article_id', $info->id)->first() ? Auth::user()->votes()->where('article_id', $info->id)->first()->vote == 1 ? 'You Vote up to this article' : 'Up' : 'Up'  }}
                        </button>
                        |
                        <button
                                class="btn btn-xs btn-danger vote">{{ Auth::user()->votes()->where('article_id', $info->id)->first() ? Auth::user()->votes()->where('article_id', $info->id)->first()->vote == 0 ? 'You vote Down to this article' : 'Down' : 'Down'  }}
                        </button>
                    </div>
            @endauth

            <!-- share with social media -->
                <div style="display: inline">

                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('/').'/info/'. $info->id }}"
                       target="_blank">
                        <img src="https://image.flaticon.com/icons/png/128/145/145802.png" alt="share in facebook"
                             style="width: 50px;height: 50px;"/>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ url('/').'/info/'. $info->id  }}"
                       target="_blank">
                        <img src="https://image.flaticon.com/icons/svg/145/145812.svg" alt="Share on Twitter"
                             style="width: 50px;height: 50px;"/>
                    </a>
                    <a href="https://plus.google.com/share?url={{ url('/').'/info/'. $info->id  }}"
                       target="_blank">
                        <img src="https://image.flaticon.com/icons/svg/145/145804.svg" alt="Share on Google"
                             style="width: 50px;height: 50px;"/>
                    </a>
                </div>


            </div>


        </div>


        <div class="container" style="border: 2px #0056b3 solid ; padding: 30px">
            @include('laravelLikeComment::comment', ['comment_item_id' => $info->id ])
        </div>

    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- share with social media -->
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
