@extends('info.create')

@section('title')
    <title>Add Question</title>
@endsection


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


    <div class="Rumor_form">
        <section>
            <h3>Add new Question</h3>

            <form action="{{ Route("questions.store")  }}" method="post" enctype="multipart/form-data">

                <!--Start Security-->
            {{csrf_field()}}
            <!--End Security-->

                <!--Start Title-->
                <div class="form-group">
                    <label for="form-title">Title</label>
                    <input type="text" class="form-control" id="form-title" aria-describedby="form-title"
                           placeholder="Title" name="title">
                </div>
                <!--End Title-->

                <!--Start Body-->
                <div class="form-group">
                    <label for="form-body">Body</label>
                    <textarea class="form-control" id="form-body" rows="3" name="body"
                              placeholder="Body"></textarea>
                </div>
                <!--End Body-->

                <!-- Start Category-->
                <div class="form-group">
                    <label for="form-category">Category</label>
                    <select class="form-control" id="form-category" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- End Category-->



                <!-- Start Tag-->
                <div class="form-group">
                    <label for="form-tag">Tags</label>
                    <select class="form-control tags-select2-multi" id="form-tag" name="tags[]" multiple="multiple">
                        @foreach ($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- End Tag-->

                <!--Start Cover-->
                <div class="form-group">
                    <label for="form-cover">Cover</label>
                    <input type="file" class="form-control" id="form-cover" aria-describedby="form-cover"
                           name="cover">
                </div>
                <!--End Cover-->

                <!--Start Submit Button-->
                <button type="submit" class="btn btn-primary">Add Question</button>
                <!--End Submit Button-->

            </form>
        </section>
    </div>

@endsection


