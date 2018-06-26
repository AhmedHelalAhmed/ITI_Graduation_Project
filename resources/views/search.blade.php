@extends('layouts.app')


@section('title')
    <title>Search</title>
@endsection

@section('style')
    <!-- Start custom -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <!-- End custom -->

@endsection

@section('content')

    <div class="container" id="portfolio" style="margin-top:90px;border: 2px #0f0f0f solid;padding: 20px; ">
        @if(isset($articles))

            <h1 style="margin-top: 30px">The search result(s):</h1>
            <ul>


                @foreach($articles as $detail)
                    <li>


                        @if($detail->type_id==1)
                            <a href="{{ '/info/'.$detail->id}}" target="_blank">
                                {{$detail->title}}
                            </a>

                        @else

                            <a href="{{ '/questions/'.$detail->id}}" target="_blank">
                                {{$detail->title}}
                            </a>

                        @endif

                    </li>

                @endforeach
            </ul>

        @else

            <h1 style="margin-top: 30px">No result</h1>
        @endif
    </div>

@endsection





