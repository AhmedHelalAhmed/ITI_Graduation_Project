@extends('layouts.app')

@section('content')
    <div class="container " style="margin-top: 40px;width: 80%;">

        <div class="card">
            <div class="card-header">
                Info
            </div>
            <div class="card-body">
                <p>
                    <span class="card-title font-weight-bold">Title :-</span> {{$info->title}}
                </p>


                <p>
                    <span class="card-title font-weight-bold">Body :-</span> {{$info->body}}
                </p>

                <p>
                    <span class="card-title font-weight-bold">Attachment :-</span> {{$info->attachment}}
                </p>

                <p>
                    <span class="card-title font-weight-bold">Cover :-</span> {{$info->cover}}
                </p>


                <p>
                    <span class="card-title font-weight-bold">author :-</span> {{$info->user->name}}
                </p>

                <p>
                    <span class="card-title font-weight-bold">Category :-</span> {{$info->category->name}}
                </p>

                <p>
                    <span class="card-title font-weight-bold">Create At :-</span> {{Carbon\Carbon::parse($info->created_at)->format('l jS \\of F Y h:i:s A')}}
                </p>
            </div>
        </div>

    </div>
@endsection