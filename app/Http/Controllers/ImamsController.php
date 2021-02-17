<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Http\Request;
use App\Models\Imam;
use App\Models\Imam_Image;
use Validator,Redirect,Response,File;
class ImamsController extends Controller
{
  public function addimam(){
    return view('admin.addimam');
  }

  public function imamadd(Request $request){
    request()->validate([
    'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
      $obj=new Imam();
      $obj->imamname=$request->title;
      $obj->about=$request->description;
      $obj->designation=$request->designation;
      // $obj->category=$request->category;
      $image=$request->images;

      if(!empty($image))
      {
        $destinationPath =public_path().'/assets/imams/';
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
  
              return Response::json(['success' => '1','message' => 'Member added successfully']);

            }
            else {
              return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);

            }
        }
  }

    public function getallimams(){
      $data['imams']=Imam::all();
      if($data){
        return view('admin.getallimam',$data);
      }
    }

public function editimam($id){
  $imam=Imam::find($id);
  return view('admin.editimam')->with('imam',$imam);
}

public function updateimam(Request $request){
    $id=$request->id;
    $obj=Imam::find($id);
    $obj->imamname=$request->title;
    $obj->about=$request->description;
    $obj->designation=$request->designation;
    // $obj->category=$request->category;
    $image=$request->images;
    
    if(!empty($image))
    {
    @unlink(public_path().'/assets/imams/'.$obj->image);
    @unlink(public_path().'/assets/imams/thumb/'.$obj->image);
    }

    if(!empty($image))
    {
      $destinationPath =public_path().'/assets/imams/';
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
            return Response::json(['success' => '1','message' => 'Member edited successfully']);

          }
          else {
            return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);

          }
}
    public function destroy($id){
      $file = Imam::find($id);
            @unlink(public_path().'/assets/imams/'.$file->image);
            @unlink(public_path().'/assets/imams/thumb/'.$file->image);
            if($file->delete()){
              return response()->json([
                  'success' => '1',
                  'message'=>'Imam deleted seccessfully!'
                ]);
           }
           else{
             return response()->json([
                 'success' => '0',
                 'message'=>'Something is wrong'
               ]);
          }

    }
    public function adddimam($id){
    $imam=Imam::find($id);
    return view('admin.addimamimage')->with('imam',$imam);
    }
  //   public function addimage(Request $request){

  //   request()->validate([ //To make restriction for file type
  //   'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
  //   ]);
  //     $images=$request->images; //veriable declaration and get its value through request
  //     $isUploaded = true; 
      
  //     if(!empty($images)) //to check if variable image doesnot have any value
  //     {
  //       foreach ($images as $key => $image) {

  //       $destinationPath =public_path().'/assets/imamsimages/';

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
        
  //       $obj = Imam_Image::create([
  //         'imam_id' => $request->id,
  //         'alttext' => $request->alttext,
  //         'image' => $filename,
  //       ]);
  //           if(!$obj){
  //             $isUploaded = false;

  //           }
            
  //         }
  //       }

  //       if($isUploaded){
  //         return 'Upload successful!';
  //       }
        
  //       return 'Something went wrong';
  // }
    public function addimage(Request $request){

    request()->validate([ //To make restriction for file type
    'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
      $images=$request->images; //veriable declaration and get its value through request
   
      $isUploaded = true; 
      
      if(!empty($images)) //to check if variable image doesnot have any value
      {
        foreach ($images as $key => $image) {

        $destinationPath =public_path().'/assets/imamsimages/';

        if (!file_exists($destinationPath)) { //to check if file doesnot exisit in destination path
          mkdir($destinationPath, 0777, true);//gives error if file exisit
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
          //Below code is to restrict user from adding more then 5 images
        if (Imam_Image::where('imam_id', $request->id)->count() > 4) 
        {
          return response()->json([
                  'success' => '0',
                  'message'=>'You have not permission to add more then 5 images...!'
                ]);
        }
        $obj = Imam_Image::create([
          'imam_id' => $request->id,
          'alttext' => $request->alttext,
          'image' => $filename,
        ]);
            if(!$obj){
              $isUploaded = false;

            }
            
          }
        }

        if($isUploaded){
          return response()->json([
                  'success' => '1',
                  'message'=>'Images added successfully...!'
                ]);
        }
        
        else{
             return response()->json([
                 'success' => '0',
                 'message'=>'Something is wrong'
               ]);
          }
  }
  public function getallimages($id){

      $data['Imam_Image']=Imam_Image::where("imam_id","=",$id)->get();
      if($data){
        return view('admin.getallimamimages',$data);
      }
    }
  public function addimamimg($id){
    $imam=Imam_Image::find($id);
    return view('admin.editimamimage')->with('imam',$imam);
    }
        public function updateimage(Request $request){
    request()->validate([
    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

      $id=$request->id;
      $obj=Imam_Image::find($id);
      $image=$request->image;
      
      if(!empty($image))
      {
      @unlink(public_path().'/assets/imamsimages/'.$obj->image);
      @unlink(public_path().'/assets/imamsimages/thumb/'.$obj->image);
      }

      $isUploaded = true;
      if(!empty($image))
      {
        $destinationPath =public_path().'/assets/imamsimages/';

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
        
        $obj = Imam_Image::where('id', $id)->update([
          //'imam_id' => $request->id,
          'alttext' => $request->alttext,
          'image' => $filename,
        ]);
            if(!$obj){
              $isUploaded = false;

            }
        }

        if($isUploaded){
          return response()->json([
                  'success' => '1',
                  'message'=>'Image Updated successfully...!'
                ]);
        }
        
        else{
             return response()->json([
                 'success' => '0',
                 'message'=>'Something is wrong'
               ]);
          }
  }

  public function destroyimage($id){
      
      $file = Imam_Image::find($id);

      @unlink(public_path().'/assets/imamsimages/'.$file->image);
      @unlink(public_path().'/assets/imamsimages/thumb/'.$file->image);

    if($file->delete()){
              return response()->json([
                  'success' => '1',
                  'message'=>'Imam image deleted seccessfully!'
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