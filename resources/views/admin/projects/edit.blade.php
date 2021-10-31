@extends('admin.base')

@section('content')


    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control mb-5" id="image">
                    <image src="{{$image->image}}" width="20%" />
                    <p class="text-danger">
                    </p>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" value="{{$project->name}}" name="name" class="form-control" id="name" placeholder="Enter Name">
                    <p class="text-danger">
                    </p>
                </div>
                <div class="form-group mb-3">
                    <label>Content</label>
                    <textarea name="content" class="form-control" placeholder="Content" id="content" cols="10"
                              rows="3">{{$project->content}}</textarea>

                </div>

                <button type="submit" id="btn" class="btn btn-primary">Submit</button>

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