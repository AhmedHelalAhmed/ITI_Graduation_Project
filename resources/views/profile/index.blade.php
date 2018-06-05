@extends('layouts.app')

@section('content')


    <!-- for show error  -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- for show error  -->


    <div class="container" style="padding-top: 50px">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <img src="storage/images/avatars/{{ $user->avatar }}"
                     style="width:150px;height: 150px;float: left;border-radius: 50%; margin-right: 25px;"/>
                <h2>{{ $user->name }}'s Profile</h2>
                <form enctype="multipart/form-data" action="/profile/{{ Auth::user()->id }}" method="post">


                    @method('PUT')
                    <label>
                        Update Profile Image
                    </label>
                    <input type="file" name="avatar"/>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                    <input type="submit" class="pull-right btn btn-sn btn-primary"/>

                </form>
            </div>
        </div>
    </div>

@endsection