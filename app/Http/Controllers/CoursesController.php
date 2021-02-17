<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use Validator,Redirect,Response,File;
use Image;
class CoursesController extends Controller
{
  public function addcourses(){
    return view('admin.addcourses');
  }

  public function postcourse(Request $request){
    request()->validate([
    'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
      $obj=new Courses();
      $obj->coursetitle=$request->title;
      $obj->description=$request->description;
      // $obj->category=$request->category;
      $image=$request->images;
      if(!empty($image))
      {
        $destinationPath =public_path().'/assets/courses/';
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
          $obj->alttext=$request->alttext;
            if($obj->save()){
              return Response::json(['success' => '1','message' => 'Course added successfully']);

            }
            else {
              return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);

            }
  }


  public function getAllCourses(){
    $data['courses']=Courses::all();
    if($data){
      return view('admin.allcourses',$data);
    }
  }

  public function editcourse($id){
    $courses=Courses::find($id);
    return view('admin.editcourse')->with('courses',$courses);
  }

  public function updatecourse(Request $request){
      $id=$request->id;
      $obj=Courses::find($id);
      $obj->coursetitle=$request->title;
      $obj->description=$request->description;
      // $obj->category=$request->category;
      $image=$request->images;
      if(!empty($image))
        {
      @unlink(public_path().'/assets/courses/'.$obj->image);
      @unlink(public_path().'/assets/courses/thumb/'.$obj->image);
       }

      if(!empty($image))
      {
        $destinationPath =public_path().'/assets/courses/';
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
          $obj->alttext=$request->alttext;
            if($obj->save()){
              return Response::json(['success' => '1','message' => 'Course edited successfully']);

            }
            else {
              return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);

            }
}


  public function destroy($id){
    $file = Courses::find($id);
          @unlink(public_path().'/assets/courses/'.$file->image);
          @unlink(public_path().'/assets/courses/thumb/'.$file->image);
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
