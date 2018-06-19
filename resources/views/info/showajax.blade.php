



    <!-- Start info-index -->
    <link href="{{ asset('css/info-show-ajax.css') }}" rel="stylesheet">
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







    @include('info.showcontent')






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



