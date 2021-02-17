<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Http\Request;
use App\Models\ImageCategory;
use App\Models\Images;
use Validator,Redirect,Response,File;

class ImagesController extends Controller
{
    public function getAllImages(){

      $data['Images']=Images::all();
      if($data){
        return view('admin.getallimages',$data);
      }
    }
    public function addimages(){
      $category = ImageCategory::all(['id', 'categorytitle']);
      return view('admin.addimages')->with('category',$category);
    }
    public function postimage(Request $request){
      request()->validate([
      'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
        $obj=new Images();
        $obj->imagetitle=$request->title;
        $obj->description=$request->description;
        $obj->category=$request->category;
        $image=$request->images;
        if(!empty($image))
        {
          $destinationPath =public_path().'/assets/images/';
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
                return Response::json(['success' => '1','message' => 'Image added successfully']);

      				}
              else {
                return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);

              }
          }
    }
    public function editimage($id){
    $image=Images::find($id);
    $data['category']=ImageCategory::all();
    return view('admin.editimage' ,$data)->with('image',$image);
}
    public function updateimages(Request $request){
     
        $id=$request->id;
        $obj=Images::find($id);
        $obj->imagetitle=$request->imagetitle;
        $obj->description=$request->description;
        $obj->category=$request->category;
        $image=$request->images;
        
        if(!empty($image))
        {
        @unlink(public_path().'/assets/images/'.$obj->image);
        @unlink(public_path().'/assets/images/thumb/'.$obj->image);
        }
        if(!empty($image))
        {
          $destinationPath =public_path().'/assets/images/';
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
                return Response::json(['success' => '1','message' => 'Image added successfully']);

              }
              else {
                return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);

              }
  }
     public function destroy($id){
        $file=Images::find($id);

      @unlink(public_path().'/assets/images/'.$file->image);
      @unlink(public_path().'/assets/images/thumb/'.$file->image);
        
        if($file->delete())
        {
          return response()->json([
            'success' => '1',
            'message'=>'Image deleted seccessfully!'
          ]);
        }else{
          return response()->json([
            'success' => '0',
            'message'=>'Something is wrong'
          ]);
        }
    }
}
