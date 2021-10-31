@extends('admin.base')

@section('content')


    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Content</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($searchs as $key=>$search)
                        <tr id="{{$search->id}}">
                            <td>{{$key+1}}</td>
                            <td>{{$search->name}}</td>
                            <td>{{$search->content}}</td>
                            <td><image src="{{$search->image}}" width="100px" /></td>
                            <td>
                                <a href="" class="btn btn-outline-success">Show</a>
                                <a href="project-edit/{{$search->id}}" class="btn btn-outline-primary">Edit</a>
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



@endsection
