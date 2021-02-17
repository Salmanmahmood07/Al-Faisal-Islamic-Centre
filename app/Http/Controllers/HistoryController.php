<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use App\Models\History;
use App\Models\Mission;
use App\Models\Vision;
use App\Models\History_Image;
class HistoryController extends Controller
{
    public function history(){
        $data['history']=History::all();
        $data['missions']=Mission::all();
        $data['visions']=Vision::all();
        return view('admin.allhistory',$data);
    }
    public function addhistory(){
      $history=History::select('content')->first();
      if($history){
        return view('admin.addhistory')->with('history',$history);
      }
      else{
        return view('admin.addhistory');
      }
    }
    public function savehistory(Request $request){
      $obj=History::find(1);
      if($obj){
      $obj->title=$request->title;
      $obj->content=$request->description;
      if($obj->save()){
        return Response::json(['success' => '1','message' => 'History edited successfully']);
      }else{
        return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
      }
    }else{
        $obj=new History();
        $obj->title=$request->title;
        $obj->content=$request->description;
        if($obj->save()){
          return Response::json(['success' => '1','message' => 'History saved successfully']);
        }else{
          return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
        }
    }
    }
    public function edithistory($id){
      $history=History::find($id);
      return view('admin.edithistory')->with('history',$history);
    }
    public function updatehistory(Request $request){
      $id=$request->id;
      $obj=History::find(1);
      if($obj){
      $obj->title=$request->title;
      $obj->content=$request->description;
      if($obj->save()){
        return Response::json(['success' => '1','message' => 'History Updated successfully']);
      }else{
        return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
      }
    }else{
        $obj=new History();
        $obj->title=$request->title;
        $obj->content=$request->description;
        if($obj->save()){
          return Response::json(['success' => '1','message' => 'History saved successfully']);
        }else{
          return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
        }
    }
    }
    public function adddhist($id){
    $history=History::find($id);
    return view('admin.addhistoryimages')->with('history',$history);
    }
    
  public function addhistimage(Request $request){
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

        $destinationPath =public_path().'/assets/historyimages/';

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
        

        $obj = History_Image::where('id', $id[$index])->update([
          'history_id' => $request->id,
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
