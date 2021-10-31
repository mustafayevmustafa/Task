@extends('admin.base')

@section('content')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    <p class="text-danger">
                    </p>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" value="" name="name" class="form-control" id="name" placeholder="Enter Name">
                    <p class="text-danger">
                    </p>
                </div>
                <div class="form-group mb-3">
                    <label>Content</label>
                    <textarea name="content" class="form-control" placeholder="Content" id="content" cols="10"
                              rows="3"></textarea>

                </div>

                <button id="btn" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>


@endsection
@section('js')
    <script>

        $("#btn").on("click",function(){

             var formData = new FormData();

             formData.append("_token", _token);
             formData.append("name", $("#name").val());
             formData.append("content", $("#content").val());
             formData.append("image", $("#image")[0].files[0])

             $.ajax({

                 type:"POST",
                 url:"project-save",
                 data:formData,
                 processData: false,
                 contentType: false,
                 success:function (response){
                     toastr.success("Post Save","Success");
                     window.location.href = "/projects";
                 },
                 error:function (response){
                     console.log(response);
                     toastr.error("Post Not Save","Error");
                 }








             });
        });


    </script>


@endsection