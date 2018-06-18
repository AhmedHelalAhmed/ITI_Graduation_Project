<form action="/tags/{{$tag->id}}" method="post">
    <!--Start Security-->
{{csrf_field()}}
@method('PUT')
<!--End Security-->
    <div class="input-group" id="tag-form">
        <input type="text" class="form-control" placeholder="Enter tag name" name="name" value="{{ $tag->name }}">
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit">Update Tag</button>
        </span>
    </div>
</form>