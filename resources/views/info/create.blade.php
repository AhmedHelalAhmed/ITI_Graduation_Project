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


    <div class="container" style="margin-top: 70px;width: 50%; text-align: right">

        <form action="{{ Route("info.store")  }}" method="post" enctype="multipart/form-data">

            {{--for security--}}
            {{csrf_field()}}

            {{--title--}}
            <div class="form-group">
                <label for="exampleInputTitle">العنوان</label>
                <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="titleHelp"
                       placeholder="العنوان" style="direction: rtl;"  name="title">
            </div>

            {{--body--}}
            <div class="form-group">
                <label for="exampleFormControlbody">المحتوى</label>
                <textarea class="form-control" id="exampleFormControlbody" style="direction: rtl;" rows="3" name="body"
                          placeholder="المحتوى"></textarea>
            </div>


            {{--category--}}
            <div class="form-group">
                <label for="exampleFormControlSelect1">التصنيف</label>
                <select class="form-control" style="direction: rtl;"  id="exampleFormControlSelect1" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            {{--cover--}}
            <div class="form-group">
                <label for="exampleFormControlCover">الغلاف</label>
                <input type="file" class="form-control"  style="direction: rtl;"  id="exampleInputFile" aria-describedby="FileHelp" name="cover">
            </div>


            {{--attachment--}}
            <div class="form-group">
                <label for="exampleFormControlattachment">فيديو</label>
                <input type="file" class="form-control"  style="direction: rtl;" id="exampleInputAttachment" aria-describedby="AttachmentHelp"
                       name="attachment">
            </div>


            {{--submit button--}}
            <button type="submit" class="btn btn-success">اضف معلومة أو خبر</button>


        </form>


    </div>



@endsection