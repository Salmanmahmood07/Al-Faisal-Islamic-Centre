<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoCategory;
use App\Models\Videos;
use Validator,Redirect,Response,File;
class VideosController extends Controller
{
  public function videos(){
        $data['videos']=Videos::all();
        return view('admin.videos',$data);
    }
  public function addvideo(){
    $category = VideoCategory::all(['id', 'categorytitle']);
    return view('admin.addvideo')->with('category',$category);
  }
  public function postvideo(Request $request){
    $obj=new Videos();
    $obj->videotitle=$request->title;
    $obj->description=$request->description;
    $obj->category=$request->category;
    $obj->video_embed_src=$request->videoembed;
    $obj->alttext=$request->alttext;
    if($obj->save()){
      return Response::json(['success' => '1','message' => 'Video added successfully']);
    }
    else {
      return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
    }
  }
  public function editvideos($id){
      $videos=Videos::find($id);
      return view('admin.editvideos')->with('video',$videos);
    }

    public function videoedit(Request $request){
      $id=$request->id;
      $obj=Videos::find($id);
    $obj->videotitle=$request->title;
    $obj->description=$request->description;
    $obj->category=$request->category;
    $obj->video_embed_src=$request->videoembed;
    $obj->alttext=$request->alttext;
    if($obj->save()){
      return Response::json(['success' => '1','message' => 'Video Updated successfully']);
      
    }
    else {
      return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
    }

    }
    public function destroy($id){
        $video=Videos::find($id)->delete($id);
        if($video)
        {
          return response()->json([
            'success' => '1',
            'message'=>'Video deleted seccessfully!'
          ]);
        }else{
          return response()->json([
            'success' => '0',
            'message'=>'Something is wrong'
          ]);
        }
    }

}
