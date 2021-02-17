<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use Validator,Redirect,Response,File;
use Image;
class BlogPostsController extends Controller
{
  public function addpost(){
    return view('admin.addpost');
  }

  public function addblogpost(Request $request){
    request()->validate([
    'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
      $obj=new BlogPost();
      $obj->posttitle=$request->title;
      $obj->description=$request->description;
      // $obj->category=$request->category;
      $image=$request->images;
      if(!empty($image))
      {
        $destinationPath =public_path().'/assets/blogposts/';
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
              return Response::json(['success' => '1','message' => 'Blog Post added successfully']);

            }
            else {
              return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);

            }
        }
  }

  public function getallposts(){
    $data['posts']=BlogPost::all();
    if($data){
      return view('admin.allposts',$data);
    }
  }

  public function editpost($id){
    $post=BlogPost::find($id);
    return view('admin.editpost')->with('post',$post);
  }

  public function updatepost(Request $request){
      $id=$request->id;
      $obj=BlogPost::find($id);
      $obj->posttitle=$request->title;
      $obj->description=$request->description;
      $image=$request->images;

      if(!empty($image))
        {
      @unlink(public_path().'/assets/blogposts/'.$obj->image);
      @unlink(public_path().'/assets/blogposts/thumb/'.$obj->image);
              }
      if(!empty($image))
      {
        $destinationPath =public_path().'/assets/blogposts/';
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
              return Response::json(['success' => '1','message' => 'Post edited successfully']);

            }
            else {
              return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);

            }
  }


  public function destroy($id){
    $file = BlogPost::find($id);
          @unlink(public_path().'/assets/blogposts/'.$file->image);
          @unlink(public_path().'/assets/blogposts/thumb/'.$file->image);
          if($file->delete()){
            return response()->json([
                'success' => '1',
                'message'=>'Post deleted seccessfully!'
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
