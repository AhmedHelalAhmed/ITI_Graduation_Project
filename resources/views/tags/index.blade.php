@extends('layouts.admin')

@section('title')
    <title>Admin | Tags</title>
@endsection




@section('include_files_head')

    <!-- Start Jquery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- End Jquery -->

    <!-- Start Delete by ajax -->
    <script type="text/javascript" charset="utf-8">
        $(document).on('click', '.btn-danger', function () {
            let self = this;
            let id = $(this).attr('target');
            let conf = confirm("Are you sure ?");
            if (conf)
                $.ajax({
                    url: `/tags/${id}`,
                    type: 'POST',
                    data: {
                        '_token': '{{csrf_token()}}',
                        '_method': 'DELETE'
                    },
                    success: res => {
                            $(self).parents('tr').remove();
                    }
                });
        });
    </script>
    <!-- End Delete by ajax -->

    <!-- Start DataTable -->
    <script>
        $(function () {
            $('#tags-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{Route('tagsdatatables.index')}}',
                columns: [
                    {data: 'name', name: 'name', searchable: true,},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
            });
        });
    </script>
    <!-- End DataTable -->



    <!-- Start Edit by jQuery -->
    <script type="text/javascript" charset="utf-8">
        $(document).on('click', '#edit-tag', function () {
            let self = this;
            let id = $(this).attr('target');
            $.ajax({
                url: `/tags/${id}/edit`,
                type: 'GET',
                data: {
                    '_token': '{{csrf_token()}}',
                    '_method': 'edit'
                },
                success: res => {
                    $("#tag-div").html(res);
                }
            });

        });
    </script>
    <!-- End Edit by jQuery -->

@endsection



@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12">
                <div id="tag-div">
                    <form action="{{ Route("tags.store")  }}" method="post">
                        <!--Start Security-->
                    {{csrf_field()}}
                    <!--End Security-->
                        <div class="input-group" id="tag-form">
                            <input type="text" class="form-control" placeholder="Enter tag name" name="name">
                            <span class="input-group-btn">
                              <button class="btn btn-default" type="submit">Add Tag</button>
                             </span>
                        </div>
                    </form>
                </div>
                <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%"
                       id="tags-table">
                    <thead>
                    <tr>
                        <th>Tag Name</th>
                        <th>actions</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->



@endsection



@section('sidebar')
    @include('layouts.sidebar')
@endsection


