@extends('layouts.admin')



@section('title')
    <title>Admin | Categories</title>
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css"/>
    <style>
        .btn {
            margin: 0 5px;
        }
    </style>
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
                    url: `/categories/${id}`,
                    type: 'POST',
                    data: {
                        '_token': '{{csrf_token()}}',
                        '_method': 'DELETE'
                    },
                    success: res => {
                        if (res.sucess = "sucess") {
                            $(self).parents('tr').remove();
                        }
                    }
                });
        });
    </script>
    <!-- End Delete by ajax -->

    <!-- Start DataTable -->
    <script>
        $(function () {
            $('#categories-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{Route('categoriesdatatables.index')}}',
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
        $(document).on('click', '#edit-category', function () {
            let self = this;
            let id = $(this).attr('target');
            $.ajax({
                url: `/categories/${id}/edit`,
                type: 'GET',
                data: {
                    '_token': '{{csrf_token()}}',
                    '_method': 'edit'
                },
                success: res => {
                    if (res.sucess = "sucess") {
                        $("#category-div").html(res);
                    }
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
                <div id="category-div">
                    <form action="{{ Route("categories.store")  }}" method="post" >
                        <!--Start Security-->
                    {{csrf_field()}}
                    <!--End Security-->
                        <div class="input-group" id="category-form">
                            <input type="text" class="form-control" placeholder="Enter category name" name="name">
                            <span class="input-group-btn">
                              <button class="btn btn-default" type="submit">Add Category</button>
                             </span>
                        </div>
                    </form>
                    </div>
                    <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%"
                           id="categories-table">
                        <thead>
                        <tr>
                            <th>Category Name</th>
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


@section('include_files_body')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
@endsection

