@extends('info.edit')


@section('title')
    <title>{{ $question->title }}</title>
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
            <form action="/questions/{{$question->id}}" method="post" enctype="multipart/form-data">
                <!--Start Security-->
            {{csrf_field()}}
            <!--End Security-->
                @method('PUT')
                <header>

                    <!--Start Title-->
                    <div class="form-group">
                        <label for="form-title">Title</label>
                        <input type="text" class="form-control" id="form-title" aria-describedby="form-title"
                               placeholder="Title" name="title" value="  {{ $question->title }}">
                    </div>
                    <!--End Title-->


                    <!-- Start Author -->
                    <p class="lead">
                        By
                        <a href="#">{{$question->user->name}}</a>
                    </p>
                    <!-- End Author -->
                </header>
                <hr>
                <section>


                    <!--Start Cover-->
                    <div class="form-group">
                        <label for="form-cover">Cover</label>
                        <input type="file" class="form-control" id="form-cover" aria-describedby="form-cover"
                               name="cover" value="{{$question->cover}}">
                    </div>
                    <!--End Cover-->


                    <hr>


                    <!--Start Body-->
                    <div class="form-group">
                        <label for="form-body">Body</label>
                        <textarea class="form-control" id="form-body" rows="3" name="body"
                                  placeholder="Body"> {{$question->body}}</textarea>
                    </div>
                    <!--End Body-->


                    <hr>


                    <!-- Start Category-->
                    <div class="form-group">
                        <label for="form-category">Category</label>
                        <select class="form-control" id="form-category" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- End Category-->


                    <hr>

                    <!-- Start Tags -->
                    <div class="form-group">
                        <label for="form-tag">Tags</label>
                        <select class="form-control tags-select2-multi" id="form-tag" name="tags[]" multiple="multiple">
                            @foreach ($tags as $tag)
                                <option class="form-control" value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Start Tags -->


                    <!--Start Submit Button-->
                    <button type="submit" class="btn btn-success">Update Question</button>
                    <!--End Submit Button-->

                </section>

            </form>
        </article>

    </div>
@endsection



@section('include_files_body')

    <!--
    very important
    Blade destroy the include_files_body in info.edit after compiled it
    and then load the new
    -->

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


    <!-- Start select 2 for tags -->
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/select2-tags.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.tags-select2-multi').select2().val({!! json_encode($question->tags()->allRelatedIds()) !!}).trigger('change');
        });
    </script>
    <!-- Start select 2 for tags -->

@endsection