<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use App\Models\Mission;
use App\Models\Mission_Image;

class MissionController extends Controller
{
  public function addmission(){
    $mission=Mission::select('content')->first();
    if($mission){
      return view('admin.addmission')->with('mission',$mission);
    }else{
      return view('admin.addmission');
    }
  }
  public function savemission(Request $request){
    $obj=Mission::find(1);
    if($obj){
    $obj->title=$request->title;
    $obj->content=$request->description;
    if($obj->save()){
      return Response::json(['success' => '1','message' => 'Mission edited successfully']);
    }else{
      return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
    }
  }else{
      $obj=new Mission();
      $obj->title=$request->title;
      $obj->content=$request->description;
      if($obj->save()){
        return Response::json(['success' => '1','message' => 'Mission saved successfully']);
      }else{
        return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
      }
  }
  }
  public function editmission($id){
      $mission=Mission::find($id);
      return view('admin.editmission')->with('mission',$mission);
    }
  public function updatemission(Request $request){
    $id=$request->id;
    $obj=Mission::find(1);
    if($obj){
    $obj->title=$request->title;
    $obj->content=$request->description;
    if($obj->save()){
      return Response::json(['success' => '1','message' => 'Mission Updated successfully']);
    }else{
      return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
    }
  }else{
      $obj=new Mission();
      $obj->title=$request->title;
      $obj->content=$request->description;
      if($obj->save()){
        return Response::json(['success' => '1','message' => 'Mission saved successfully']);
      }else{
        return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
      }
  }
  }
  public function adddmiss($id){
    $mission=Mission::find($id);
    return view('admin.addmissionimages')->with('mission',$mission);
    }
    public function addmissimage(Request $request){
    request()->validate([
    'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
      $images=$request->images;
      $isUploaded = true;
      $id = [1, 2, 3];
      $index = 0;
      if(!empty($images))
      {

        foreach ($images as $key => $image) {

        $destinationPath =public_path().'/assets/missionimages/';

        if (!file_exists($destinationPath)) {
          mkdir($destinationPath, 0777, true);
        }

        $filename = time().$image->getClientOriginalName();

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
        
        $obj = Mission_Image::where('id', $id[$index])->update([
          'mission_id' => $request->id,
          'alttext' => $request->alttext,
          'image' => $filename,
        ]);
        $index++;
            if(!$obj){
              $isUploaded = false;

            }
            
          }
        }

        if($isUploaded){
          return 'Upload successful!';
        }
        
        return 'Something went wrong';
  }
}
