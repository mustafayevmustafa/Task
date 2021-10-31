@extends('admin.base')

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row mb-3">
                    <div class="col-10">
                        <div class="input-group mb-3">
                            <form action="{{route('search')}}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" id="myInput" class="form-control" placeholder="search" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit">Button</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-2 mb-5">
                        <a href="{{route('project-add')}}" class="btn btn-outline-success d-block">Add</a>
                    </div>

                </div>

                <table class="table table-striped" id="myTable"  >
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">@lang('index.name')</th>
                        <th scope="col">@lang('index.content')</th>
                        <th scope="col">@lang('index.image')</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projects as $key=>$project)
                        <tr id="{{$project->id}}">
                            <td>{{$key+1}}</td>
                            <td>{{$project->name}}</td>
                            <td>{{$project->content}}</td>
                            <td><image src="{{$project->image}}" width="100px" /></td>
                            <td>
                                <a href="project-show/{{$project->id}}" class="btn btn-outline-success">Show</a>
                                <a href="project-edit/{{$project->id}}" class="btn btn-outline-primary">Edit</a>
                                <button class="btn btn-outline-danger btn_del" >DELETE</button>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        });

        $(".btn_del").on("click",function (){

            var id=$(this).parents().eq(1).attr("id");
            var _this = $(this);

            $.ajax({
                type: "POST",
                url: "/project-delete",
                data : {
                    id: id,
                    _token: _token,
                },
                success: function (response) {
                    _this.parents().eq(1).remove();
                    toastr.success("Post Delete","Success");
                },
                error: function (response) {
                    toastr.error("Post Not Delete","Error");
                },


            });



        });

        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });





    </script>


@endsection
