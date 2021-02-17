<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use App\Models\Projects;
use Image;
class ProjectsController extends Controller
{
  public function addproject(){
    return view('admin.addprojects');
  }

  public function postproject(Request $request ){
    $obj=new Projects();
    $obj->projecttitle=$request->title;
    $obj->description=$request->description;


    $image=$request->images;
    if(!empty($image))
    {
      $destinationPath =public_path().'/assets/projects/';
      if (!file_exists($destinationPath)) {
        mkdir($destinationPath, 0777, true);
      }
      $filename           = time().$image->getClientOriginalName();

      $image->move($destinationPath, $filename);
      $img = Image::make($destinationPath.$filename);
      $img->resize(250, 250,
        function ($constraint) {
          $constraint->aspectRatio();
        });
        if (!file_exists($destinationPath.'thumb/')) {
          mkdir($destinationPath.'thumb/', 0777, true);
        }
        $img->save($destinationPath.'/thumb/'.$filename);
        $obj->image=$filename;
        $obj->startdate=$request->startdate;

          if($obj->save()){
            return Response::json(['success' => '1','message' => 'Project added successfully']);

          }
          else {
            return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);

          }
      }

  }

  public function getAllProjects(){
    $data['projects']=Projects::all();
    if($data){
      return view('admin.allprojects',$data);
    }
  }

  public function editproject($id){
    $projects=Projects::find($id);
    return view('admin.editprojects')->with('projects',$projects);
  }

  public function updateproject(Request $request){
    $id=$request->id;
    $obj=Projects::find($id);
    $image=$request->images;

    if(!empty($image))
    {
    @unlink(public_path().'/assets/projects/'.$obj->image);
    @unlink(public_path().'/assets/projects/thumb/'.$obj->image);
    }
    
    if(!empty($image))
    {
      $destinationPath =public_path().'/assets/projects/';
      if (!file_exists($destinationPath)) {
        mkdir($destinationPath, 0777, true);
      }
      $filename           = time().$image->getClientOriginalName();

      $image->move($destinationPath, $filename);
      $img = Image::make($destinationPath.$filename);
      $img->resize(250, 250,
        function ($constraint) {
          $constraint->aspectRatio();
        });
        if (!file_exists($destinationPath.'thumb/')) {
          mkdir($destinationPath.'thumb/', 0777, true);
        }
        $img->save($destinationPath.'/thumb/'.$filename);
        $obj->image=$filename;
      }
      $obj->projecttitle=$request->title;
      $obj->description=$request->description;
      $obj->startdate=$request->startdate;

    if($obj->save()){
      return Response::json(['success' => '1','message' => 'Project edited successfully']);
    }
    else {
      return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
    }

  }

  public function destroy($id){
    $file = Projects::find($id);
          @unlink(public_path().'/assets/projects/'.$file->image);
          @unlink(public_path().'/assets/projects/thumb/'.$file->image);
          if($file->delete()){
            return response()->json([
                'success' => '1',
                'message'=>'Courses deleted seccessfully!'
              ]);
         }
         else{
           return response()->json([
               'success' => '0',
               'message'=>'Something is wrong'
             ]);
        }

  }

}
