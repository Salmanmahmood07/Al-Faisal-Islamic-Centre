<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Input;
use Response;
use App\Models\VideoCategory;
class VideoCategoryController extends Controller
{
  public function addvideocategory(Request $request){
    $messages=array(
      'videocategorytitle.required'=>'This field is required',
      'videocategorytitle.unique' => 'Provided category is already exist',
    );
    $rules=array(
        'videocategorytitle' => 'required|unique:video_categories,categorytitle',
    );
    $validator = \Validator::make($request->all() , $rules, $messages);
    if ($validator->fails())
    {
     return Response::json(['success' => '0','validation'=>'0','message' => $validator->errors()]);
    }
    else{
     $addcategory=addvideocategory($request);
     if($addcategory)
     {

       return Response::json(['success' => '1','message' => 'Category added successfully']);
     }
     else
     {
      return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
     }
   }

  }
}
