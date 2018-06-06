@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All info</h1>
        <a class="btn btn-success" href="/info/create">Create info</a>
        <div class="my-3 p-3 bg-white rounded box-shadow">
            <h6 class="border-bottom border-gray pb-2 mb-0">Recent info</h6>
            @foreach ($info as $info_element)
                <div class="media text-muted pt-3">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">@ {{  $info_element->user->name }}</strong>
                        <a href="/info/{{ $info_element->id }}">{{ $info_element->title }}</a>
                    </p>

                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('/').'/info/'. $info_element->id }}"
                       target="_blank">
                        Share on Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ url('/').'/info/'. $info_element->id  }}"
                       target="_blank">
                        Share on Twitter
                    </a>
                    <a href="https://plus.google.com/share?url={{ url('/').'/info/'. $info_element->id  }}"
                       target="_blank">
                        Share on Google
                    </a>

                </div>
            @endforeach
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
@endsection