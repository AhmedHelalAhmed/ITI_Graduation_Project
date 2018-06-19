@extends('info.show')


@section('title')
    <title>{{ $question->title }}</title>
@endsection



@section('content')
    @include('info.showcontent')
@endsection

