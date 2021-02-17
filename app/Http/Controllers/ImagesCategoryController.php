<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Input;
use Response;
use App\Models\ImageCategory;
class ImagesCategoryController extends Controller
{
    public function imagecategory(){
      $category = ImageCategory::all();
      return view('admin.imagecategory')->with('category',$category);
      }
      public function addimagecategory(Request $request){
        
        $obj=new ImageCategory();
        $obj->categorytitle=$request->title;

        if($obj->save()){
                return Response::json(['success' => '1','message' => 'Category added successfully']);

        }
          else {
            return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);

        }
    }
    // public function addimagecategory(Request $request){
    //   $messages=array(
    //     'imgcategorytitle.required'=>'This field is required',
    //     'imgcategorytitle.unique' => 'Provided category is already exist',
    //   );
    //   $rules=array(
    //       'imgcategorytitle' => 'required|unique:image_categories,categorytitle',
    //   );
    //   $validator = \Validator::make($request->all() , $rules, $messages);
    //   if ($validator->fails())
    //   {
    //    return Response::json(['success' => '0','validation'=>'0','message' => $validator->errors()]);
    //   }
    //   else{
    //    $addcategory=addimagecategory($request);
    //    if($addcategory)
    //    {
    //      $category['data'] = ImageCategory::all();

    //      // return view('admin.addimages')->with('category',$category);
    //      return Response::json(['success' => '1','message' => 'Category added successfully',$category]);
    //    }
    //    else
    //    {
    //     return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
    //    }
    //  }

    // }
}
