@extends('layouts.app')


@section('title')
    <title>{{ $user->name }}</title>
@endsection

@section('style')
    <!-- Start Style -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- End Style -->

@endsection

@section('content')
    <div class="publishes">
        <article>
            <header>
                <h2>{{ $user->name }}</h2>
            </header>
            <section class="container">
                <h3>Info</h3>
                <div class="row-12">
                    <p class="col-12"><span>Photo</span> : <img
                                src="{{ asset('/storage/images/avatars/'.$user->avatar) }}"
                                alt="{{ $user->name }}'s avatar"/></p>
                    <p class="col"><span>Email</span> : {{ $user->email }}</p>
                </div>

            </section>
            <section>
                <h3>Articles</h3>
                <div class="row">
                    @foreach($user->articles as $article)
                        <p class="col-12"><a href="/info/{{ $article->id }}">{{ $article->title }}</a></p>
                    @endforeach
                </div>
            </section>
        </article>
    </div>

@endsection



@section('sidebar')
    @include('layouts.sidebar')
@endsection
