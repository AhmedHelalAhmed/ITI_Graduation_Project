@extends('info.show')


@section('title')
    <title>{{ $question->title }}</title>
@endsection



@section('content')
    @include('questions.showcontent')
@endsection

