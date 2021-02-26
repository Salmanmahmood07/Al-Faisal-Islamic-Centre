<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;
use Illuminate\Routing\Redirector;
use App\Models\IslamicTopics;
use App\Models\IslamicTopicsReply;
use Carbon\Carbon;
use Auth;
use App\Models\Services;
use App\Models\NewsPage;
use App\Models\Imam;
use App\Models\BlogPost;
use App\Models\Courses;
use App\Models\Videos;

class MainController extends Controller
{
    public function index(){
      $data['services']=Services::all();
      $data['events']=Newspage::paginate(2);
      $data['imams']=Imam::paginate(4);
      $data['posts']=BlogPost::paginate(4);
      $data['courses']=Courses::paginate(2);
      $data['videos']=Videos::paginate(2);
      return view('frontend.index',$data);
    }


    public function dashboard(){
      if(!logg_in())
      {
        return redirect('/');
      }else{
        $user=getCurrentUserData();
        return view('frontend.dashboard')->with('user',$user);
      }

    }
    public function forumdashboard(){
      if(!logg_in())
      {
        return redirect('/');
      }else{
        $user=getCurrentUserData();
        $getquestion=showforumquestion();
        $today=Carbon::now();
        return view('frontend.forum-dashboard')->with('getquestion',$getquestion)->with('today',$today);
      }
    }

    public function forumnewtopic(){
      if(!logg_in())
      {
        return redirect('/');
      }else{
        $today=Carbon::now();
        $user=getCurrentUserData();
        $data=IslamicTopics::latest()
        ->limit(3)
        ->get();
        return view('frontend.newtopic')->with('user',$user)->with('data',$data)->with('today',$today);
      }
    }
    public function singlequestion($id){
      if(!logg_in())
      {
        return redirect('/');
      }else{
        $usr=showsinglequestion($id);
        $data['user']=showsinglequestion($id);
        $data['getuserreply']=IslamicTopicsReply::select("islamic_topics_replies.reply_content as reply","users.name as username","islamic_topics_replies.created_at as createdtime")
            ->join("users","users.id","=","islamic_topics_replies.user_id")
            ->join("islamic_topics","islamic_topics.id","=","islamic_topics_replies.topic_id")
            ->where("islamic_topics_replies.topic_id","=",$usr->id)
            ->paginate(2);
            $today=Carbon::now();

            // dd($data['getuser']);
        // $data['getreply']=
        // $getquestion=
        // $user = IslamicTopicsReply::join('islamic_topics', 'islamic_topics_replies.topic_id', '=', 'islamic_topics.id')
        // ->join('user_setups', 'islamic_topics_replies.user_id', '=', 'user_setups.id')
        // ->select('user_setups.name', 'islamic_topics.subject', 'islamic_topics.question','islamic_topics_replies.reply_content','islamic_topics.id')
        // ->where('islamic_topics.id','=',$userget->id)
        // ->first();
        // dd($user);
        // $data['user']=
        // $user=showsinglequestion($id);
        return view('frontend.singlequestion')->with($data)->with('today',$today);
      }
    }

    public function postreply(Request $request,$id){
      $getuserid=getCurrentUserData();
      $postreply=postquestionreply($request,$id,$getuserid->id);
      if($postreply){
        return Response::json(['success' => '1','message' => 'Answer given successfully']);
      }else {
        return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);

      }
    }

    public function postquestion(Request $request){
      $getuserid=getCurrentUserData();
      $postquestion=postquestion($request,$getuserid->id);
      if($postquestion){
        return Response::json(['success' => '1','message' => 'Topic Added successfully']);
      }
      else
      {
       return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
     }
    }

    public function accounts($id){
      if(!logg_in())
      {
        return redirect('/');
      }else{
        $user=User::find($id);
        return view('frontend.accountsettings')->with('user',$user);
      }
    }

      public function logout()
      {
          Auth::logout();
          return redirect('/');
      }

    public function userSignUp(Request $request){
      $messages = array(
    'email.required' => 'This Field is Required',
    'email.email' => 'Invalid Email',
    'email.unique' => 'Provided email is already attached with an account',
    'password.required' => 'This Field is Required',
    'name.required'=>'This Field is Required',


  );
  $rules = array(
    'email' => 'required|email|unique:users,email',
    'password' => 'required|min:5|max:18|confirmed',
    'password_confirmation' => 'required|min:5|max:18',
    'name' => 'required|min:3|max:60',

  );
  $validator = \Validator::make($request->all() , $rules, $messages);
  if ($validator->fails())
  {
   return Response::json(['success' => '0','validation'=>'0','message' => $validator->errors()]);
 }
 else
 {

  $register_user = registerUser($request);

  if($register_user)
  {

    return Response::json(['success' => '1','message' => 'You have registered successfully']);

  }
  else
  {
   return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
 }

}
    }

    public function login_user(Request $request){

  $messages = array(
    'email.required' => 'This Field is Required',
    'email.email' => 'Invalid Email',
    'password.required' => 'This Field is Required',
  );
  $rules = array(
    'email' => 'required|email',
    'password' => 'required',
  );
  $validator = \Validator::make($request->all() , $rules, $messages);
  if ($validator->fails())
  {
    return Response::json(['success' => '0','validation'=>'0','message' => $validator->errors()]);
  }
 else
 {
   $loginuser=loginUser($request);
   if($loginuser)
   {

     return Response::json(['success' => '1','message' => 'You have logedin successfully']);

   }else {
     return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);

   }
}
}




    public function updateprofile($id){
      if(!logg_in())
      {
        return redirect('/');
      }else{
        $user=User::find($id);
        return view('frontend.updateprofile')->with('user',$user);

      }
    }
    public function addemail(Request $request,$id){
      $messages=array(
        'email.required'=>'This field is required ',
        'email.email' => 'Invalid Email',
        'email.unique' => 'Provided email is already attached with an account',
      );
      $rules=array(
        'email' => 'required|email|unique:users,email',
      );
      $validator = \Validator::make($request->all() , $rules, $messages);
      if ($validator->fails())
      {
        return Response::json(['success' => '0','validation'=>'0','message' => $validator->errors()]);
      }else{
        $updateemail=updateuseremail($request,$id);
        if($updateemail){
          return Response::json(['success' => '1','message' => 'Email has been added']);

        }else {
          return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);

        }
      }
    }

    public function changepassword(Request $request,$id){
      $messages=array(
        'currentpassword.required' => 'This Field is Required',
        'password.required'=>'This field is required',
        'password_confirmation'=>'This field is required'
      );
      $rules=array(
        'currentpassword' => 'required',
        'password' => 'required|min:5|max:18|confirmed',
        'password_confirmation' => 'required|min:5|max:18',
      );
      $validator = \Validator::make($request->all() , $rules, $messages);
      if ($validator->fails())
      {
        return Response::json(['success' => '0','validation'=>'0','message' => $validator->errors()]);
      }else{
        $updatepass=updatepassword($request,$id);
        if($updatepass){
          return Response::json(['success' => '1','message' => 'Password has been updated']);

        }else {
          return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);

        }
      }
    }
    public function profileupdate(Request $request,$id){
      $messages = array(
        'name.required'=>'This  field is required',
        'marital.required' => 'This Field is Required',
        'email.email' => 'Invalid Email',
        'dob.required' => 'This Field is Required',
        'gender.required'=>'This field is required',
        'about.required'=>'This field is required',
      );
      $rules = array(
        'name' => 'required|min:3|max:60',
        'marital' => 'required',
        'dob' => 'required',
        'gender' => 'required',
        'about' => 'required',
      );
      $validator = \Validator::make($request->all() , $rules, $messages);
      if ($validator->fails())
      {
        return Response::json(['success' => '0','validation'=>'0','message' => $validator->errors()]);
      }else{
        $update_profile=updateprofile($request,$id);
        if($update_profile)
        {

          return Response::json(['success' => '1','message' => 'Profile has been updated']);

        }else {
          return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);

        }
      }
    }
}
