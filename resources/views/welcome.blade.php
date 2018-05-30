@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Recent Info</div>

                    <div class="card-body">
                        @foreach ($info as $info_element)
                            <p>
                                <a href="/info/{{ $info_element->id }}">{{ $info_element->title }}</a>
                                <strong class="text-gray-dark">@ {{  $info_element->user->name }}</strong>
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
