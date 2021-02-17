<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use App\Models\Vision;
use App\Models\Vision_Image;

class VisionController extends Controller
{
    public function addvision(){
    $vision=Vision::select('content')->first();
    if($vision){
      return view('admin.addvision')->with('vision',$vision);
    }else{
      return view('admin.addvision');
    }
  }
  public function savevision(Request $request){
    $obj=vision::find(1);
    if($obj){
    $obj->title=$request->title;
    $obj->content=$request->description;
    if($obj->save()){
      return Response::json(['success' => '1','message' => 'Vision edited successfully']);
    }else{
      return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
    }
  }else{
      $obj=new Vision();
      $obj->title=$request->title;
      $obj->content=$request->description;
      if($obj->save()){
        return Response::json(['success' => '1','message' => 'Vision saved successfully']);
      }else{
        return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
      }
  }
  }
  public function editvision($id){
      $vision=Vision::find($id);
      return view('admin.editvision')->with('vision',$vision);
    }
  public function updatevision(Request $request){
    $id=$request->id;
    $obj=Vision::find(1);
    if($obj){
    $obj->title=$request->title;
    $obj->content=$request->description;
    if($obj->save()){
      return Response::json(['success' => '1','message' => 'Vision Updated successfully']);
    }else{
      return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
    }
  }else{
      $obj=new Vision();
      $obj->title=$request->title;
      $obj->content=$request->description;
      if($obj->save()){
        return Response::json(['success' => '1','message' => 'Vision saved successfully']);
      }else{
        return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
      }
  }
  }
  public function adddvis($id){
    $vision=Vision::find($id);
    return view('admin.addvisionimages')->with('vision',$vision);
    }
    public function addvisimage(Request $request){
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

        $destinationPath =public_path().'/assets/visionimages/';

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
        
        $obj = Vision_Image::where('id', $id[$index])->update([
          'vision_id' => $request->id,
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
      // CODE FOR ADDING IMAGES
  
  //   public function addvisimage(Request $request){
  //   request()->validate([ //To make restriction for file type
  //   'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
  //   ]);
  //     $images=$request->images; //veriable declaration and get its value through request
   
  //     $isUploaded = true; 
      
  //     if(!empty($images)) //to check if variable image doesnot have any value
  //     {
  //       foreach ($images as $key => $image) {

  //       $destinationPath =public_path().'/assets/visionimages/';

  //       if (!file_exists($destinationPath)) { //to check if file doesnot exisit in destination path
  //         mkdir($destinationPath, 0777, true);//gives error if file exisit
  //       }

  //       $filename = time().$image->getClientOriginalName();

  //       $image->move($destinationPath, $filename);
  //       $img = Image::make($destinationPath.$filename);

  //       $img->resize(250, 250,
  //         function ($constraint) {
  //           $constraint->aspectRatio();
  //         });
  //         if (!file_exists($destinationPath.'thumb/')) {
  //           mkdir($destinationPath.'thumb/', 0777, true);
  //         }
  //         $img->save($destinationPath.'/thumb/'.$filename);
          
  //       $obj = Vision_Image::create([
  //         'vision_id' => $request->id,
  //         'alttext' => $request->alttext,
  //         'image' => $filename,
  //       ]);
  //           if(!$obj){
  //             $isUploaded = false;

  //           }
            
  //         }
  //       }

  //       if($isUploaded){
  //         return response()->json([
  //                 'success' => '1',
  //                 'message'=>'Images added successfully...!'
  //               ]);
  //       }
        
  //       else{
  //            return response()->json([
  //                'success' => '0',
  //                'message'=>'Something is wrong'
  //              ]);
  //         }
  // }
}