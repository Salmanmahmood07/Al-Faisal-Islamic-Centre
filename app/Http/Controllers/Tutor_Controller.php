<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserRoles;
use Illuminate\Support\Facades\Crypt;
use Session;
use Input;
use Illuminate\Routing\Redirector;
use Carbon\Carbon;
use Auth;
use App\Models\TutorSetup;
use DB;
use Image;

class Tutor_Controller extends Controller
{
    public function tutorlogin(){
      return view('tutor.login');
    }
    public function tutorsignup(){
      return view('tutor.signup');
    }
    public function tsignup(Request $request){
      $obj= new User();
    $obj->name=$request->name;
    $obj->email=$request->email;
    $obj->about=$request->about;
    $obj->password=\Hash::make($request->password);
    $obj->type = 'tutor';
    $obj->verifyToken = Hash::make(uniqid());
    $obj->role_id=2;
    $obj->status=2;

    $image=$request->images;
    if(!empty($image))
    {
      $destinationPath =public_path().'/assets/tutors/';
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
        $obj->photo=$filename;

    if($obj->save()){
            return Response::json(['success' => '1','message' => 'Tutor registered successfully']);

          }
          else {
            return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);

          }

	}
}
    public function tutor_authenticate(Request $request){
      $messages=array(
        'email.required'=>'This field is required',
        'email.email'=>'Invalid Email',
        'password.password'=>'This field is required'
      );
      $rules=array(
        'email'=>'required|email',
        'password'=>'required|min:5|max:18'
      );
      $validator=\Validator::make($request->all(),$rules,$messages);
      if ($validator->fails())
      {
      return back()->withErrors($validator)->withInput();
    }else {
      $data = User::where([['email','=',$request->email],['type','=','tutor']])->first();
      if($data){
        if(\Hash::check($request->password, $data->password))
        {
          if($data->status=='2'){

         Auth::attempt(['email' => $request->email, 'password' => $request->password]);
         Session::put('tutor_id', $data->id);
         Session::put('tutor_name', $data->name);
         Session::put('email', $data->email);
         Session::put('image', $data->photo);
         //dd($data);
          return redirect('/tutor/dashboard');
         //return view('/tutor.dashboard');
          }
       }
       else {
             Session::flash('login_feedback', 'Invalid User.');
             return back()->withErrors($validator)->withInput();
           }
     }else
     {
       Session::flash('login_feedback', 'Provided credentials are incorrect. Please try again');
       return back()->withErrors($validator)->withInput();
     }
    }
    }
    public function dashboard(){
      
        $value=Session::get('tutor_id');
        $tutor=User::where('id', $value)->first();
        return view('/tutor.dashboard')->with('tutor',$tutor);
    
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/tutor');
    }
}
