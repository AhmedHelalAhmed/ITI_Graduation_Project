@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All info</h1>
        <a class="btn btn-success" href="/infos/create">Create info</a>
        <div class="my-3 p-3 bg-white rounded box-shadow">
            <h6 class="border-bottom border-gray pb-2 mb-0">Recent info</h6>
            @foreach ($info as $info_element)
                <div class="media text-muted pt-3">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">@ {{  $info_element->user->name }}</strong>
                        <a href="/info/{{ $info_element->id }}">{{ $info_element->title }}</a>
                    </p>
                </div>
            @endforeach
        </div>
@endsection