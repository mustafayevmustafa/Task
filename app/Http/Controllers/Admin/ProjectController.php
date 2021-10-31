<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\project_image;
use App\Models\projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Yajra\DataTables\Services\DataTable;

class ProjectController extends Controller
{
    public  function  index(Request $request)
    {
        $projects=Projects::select(
            'id',
            'name',
            'content',
            DB::raw("(SELECT image  FROM  project_images where project_id=projects.id)"),
        )->get();


        return view('admin.projects.index',compact('projects'));
    }

    public function  add()
    {

        return view("admin.projects.create");
    }

    public  function  save(Request  $request){

        $request->validate([
           'name'=>'required|min:3',
            'image' => 'image|mimes:jpeg,png,jpg,svg',
            'content'=>'required|min:3',
        ]);

        $project= new Projects();
        $project->name=$request->name;
        $project->content=$request->content;
        $project->save();


        $addImage = new project_image();
        $image = $request->file('image');
        $image = str_replace(['public', 'http:'], ['storage', App::environment() == 'projection' ? 'https:' : 'http:'], asset($image->store('public/project')));
        $addImage->image = $image;

        $addImage->project_id=$project->id;

        $addImage->save();
        return response()->json(['succcess'=>'yes']);
    }

    public  function  edit($id)
    {
        $project = Projects::where('id',$id)->first();
        $image   = Project_image::where('project_id',$id)->first();

        return view('admin.projects.edit',compact('project','image','id'));

    }
    public function  update(Request $request)
    {
        $project = Projects::where("id",$request->id)->first();
        $project->name = $request->name;
        $project->content = $request->content;

        $project->save();

        $addImage = Project_image::where("project_id",$request->id)->first();

        if($request->hasFile('image'))
        {

            $image = $request->file('image');

            $image = str_replace(['public', 'http:'], ['storage', App::environment() == 'projection' ? 'https:' : 'http:'], asset($image->store('public/project')));
            $addImage->image = $image;
            $addImage->save();
        }


        return response()->json(['status'=>'success']);

    }

    public  function  delete(Request  $request){

        Projects::where('id',$request->id)->delete();
        return response()->json(['status'=>'success']);
    }


    public function  search(Request  $request){
         $searchs = Projects::where("name","ILIKE","%".$request->search."%")
             ->orWhere('content','ILIKE','%'.$request->search.'%')
             ->get();
         return view("admin.search",compact('searchs'));
    }

    public function  show($id)
    {
        $project = Projects::where('id',$id)->first();
        $image   = Project_image::where('project_id',$id)->first();

        return view('admin.projects.show',compact('project','image','id'));
    }
}
