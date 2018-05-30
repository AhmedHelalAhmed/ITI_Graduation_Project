@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="container" style="margin-top: 70px;width: 50%;">

        <form action="{{ Route("info.store")  }}" method="post" enctype="multipart/form-data">

            {{--for security--}}
            {{csrf_field()}}

            {{--title--}}
            <div class="form-group">
                <label for="exampleInputTitle">Title</label>
                <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="titleHelp"
                       placeholder="Enter title" name="title">
            </div>

            {{--body--}}
            <div class="form-group">
                <label for="exampleFormControlbody">body</label>
                <textarea class="form-control" id="exampleFormControlbody" rows="3" name="body"
                          placeholder="info body"></textarea>
            </div>


            {{--category--}}
            <div class="form-group">
                <label for="exampleFormControlSelect1">Category</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            {{--cover--}}
            <div class="form-group">
                <label for="exampleFormControlCover">Cover</label>
                <input type="file" class="form-control" id="exampleInputFile" aria-describedby="FileHelp" name="cover">
            </div>


            {{--attachment--}}
            <div class="form-group">
                <label for="exampleFormControlattachment">Attachment</label>
                <input type="file" class="form-control" id="exampleInputAttachment" aria-describedby="AttachmentHelp"
                       name="attachment">
            </div>


            {{--submit button--}}
            <button type="submit" class="btn btn-success">Add info</button>


        </form>


    </div>



@endsection