<form action="/categories/{{$category->id}}" method="post">
    <!--Start Security-->
{{csrf_field()}}
@method('PUT')
<!--End Security-->
    <div class="input-group" id="category-form">
        <input type="text" class="form-control" placeholder="Enter category name" name="name" value="{{ $category->name }}">
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit">Update Category</button>
        </span>
    </div>
</form>