@extends('layouts.app')

@section('title')
    <title>All Tags</title>
@endsection


@section('style')
    <!-- Start style -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- End Style -->

    <!-- Start info-index -->
    <link href="{{ asset('css/tags-index.css') }}" rel="stylesheet">
    <!-- End info-index -->


@endsection



@section('content')

    <div class="tags">
        <!-- start flash notification -->
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                <strong>Successful:</strong>
                {{ Session::get('success') }}
            </div>
        @endif
        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <strong>Errors:</strong>
                <ul>
                    @foreach($errors as $error)
                        <li>  {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
    @endif
    <!-- end flash notification -->
        <section class="container">
            <h2>Tags</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th scope="row">{{ $tag->id }}</th>
                        <td>{{ $tag->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>

        <section>
            <div class="container">
                <h2>New Tag</h2>
                <form action="{{ route('tags.store') }}" method="POST">
                    {{ csrf_field() }}
                    <label for="name">Name :</label>
                    <input type="text" id="name" name="name" class="form-control"/>
                    <button class="btn btn-primary btn-block btn-h1-spacing">Create New Tag</button>
                </form>
            </div>
        </section>
    </div>





@endsection



@section('sidebar')
    @include('layouts.sidebar')
@endsection


@section('include_files_body')
    <!-- Start Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- End Jquery -->
@endsection