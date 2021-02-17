<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Http\Request;
use App\Models\Services;
use Validator,Redirect,Response,File;

class ServicesController extends Controller
{
  public function addservices(){
    return view('admin.addservices');
  }

  public function postservice(Request $request){
    request()->validate([
    'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
      $obj=new Services();
      $obj->servicetitle=$request->title;
      $obj->description=$request->description;
      // $obj->category=$request->category;
      $image=$request->images;
      if(!empty($image))
      {
        $destinationPath =public_path().'/assets/services/';
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
          $obj->alttext=$request->alttext;
            if($obj->save()){
              return Response::json(['success' => '1','message' => 'Services added successfully']);

            }
            else {
              return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);

            }
        }
  }


  public function getAllServices(){
    $data['services']=Services::all();
    if($data){
      return view('admin.allservices',$data);
    }
  }

  public function editservice($id){
    $service=Services::find($id);
    return view('admin.editservice')->with('service',$service);
  }

  public function updateservice(Request $request){
    
      $id=$request->id;
      $obj=Services::find($id);
      $obj->servicetitle=$request->title;
      $obj->description=$request->description;
      // $obj->category=$request->category;
      $image=$request->images;
      
      if(!empty($image))
      {
      @unlink(public_path().'/assets/services/'.$obj->image);
      @unlink(public_path().'/assets/services/thumb/'.$obj->image);
      }

      if(!empty($image))
      {
        $destinationPath =public_path().'/assets/services/';
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
              return Response::json(['success' => '1','message' => 'Services edited successfully']);

            }
            else {
              return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);

            }
  }
  public function destroy($id){
    $file = Services::find($id);
          @unlink(public_path().'/assets/services/'.$file->image);
          @unlink(public_path().'/assets/services/thumb/'.$file->image);
          if($file->delete()){
            return response()->json([
                'success' => '1',
                'message'=>'Service deleted seccessfully!'
              ]);
         }
         else{
           return response()->json([
               'success' => '0',
               'message'=>'Something is wrong'
             ]);
        }
    // $user=Services::find($id)->delete($id);
    // if($user)
    // {
    //   return response()->json([
    //     'success' => '1',
    //     'message'=>'Service deleted seccessfully!'
    //   ]);
    // }else{
    //   return response()->json([
    //     'success' => '0',
    //     'message'=>'Something is wrong'
    //   ]);
    // }
  }
}
