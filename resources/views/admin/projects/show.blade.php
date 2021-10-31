@extends('admin.base')

@section('content')


    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="form-group">
                    <label>Image</label>
                    @if(isset($image))
                        <image src="{{$image->image}}" width="20%" />
                    @endif
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" value="{{$project->name}}" name="name" class="form-control" id="name" placeholder="Enter Name" disabled>

                </div>
                <div class="form-group mb-3">
                    <label>Content</label>
                    <textarea name="content" class="form-control" placeholder="Content" id="content" cols="10"
                              rows="3" disabled>{{$project->content}}</textarea>

                </div>


            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(document).ready(function () {


            $("#btn").on("click", function () {


                var formData = new FormData();
                formData.append("_token", _token);
                formData.append("name", $('#name').val());
                formData.append("id",{{$id}});
                formData.append("content", $('#content').val());
                formData.append("image", $("#image")[0].files[0])

                $.ajax({
                    type: "POST",
                    url: "/project-update",
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function (response) {
                        console.log(response);
                        toastr.success("Post Save","Success");
                        window.location.href = "/projects";

                    },
                    error: function (response) {
                        console.log(response);
                        toastr.error("Post Not Save","Error");
                    },
                });


            });


        });
    </script>


@endsection