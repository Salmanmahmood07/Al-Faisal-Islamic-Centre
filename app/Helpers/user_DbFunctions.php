<?php

function registerUser($request){
    $obj= new App\Models\User();
    $obj->name=$request->name;
    $obj->email=$request->email;
    $obj->password=\Hash::make($request->password);
    $obj->type = 'user';
    $obj->verifyToken = Hash::make(uniqid());
    $obj->role_id=1;
    $obj->status=1;
    if($obj->save()){
      return true;
    }else {
      return false;
    }
}

function postquestion($request,$id){
  $obj=new App\Models\IslamicTopics();
  $obj->subject=$request->subject;
  $obj->question=$request->question;
  $obj->user_id=$id;
  if($obj->save()){
    return true;
  }else {
    return false;
  }
}

function showforumquestion(){
  $obj= App\Models\IslamicTopics::paginate(4);
  return $obj;
}

function showsinglequestion($id){
  $obj=App\Models\IslamicTopics::find($id);
  return $obj;
}

function postquestionreply($request,$id,$user_id){
  $obj=new App\Models\IslamicTopicsReply();
  $obj->reply_content=$request->reply;
  $obj->topic_id=$id;
  $obj->user_id=$user_id;
  if($obj->save()){
    return true;
  }else {
    return false;
  }
}

function loginUser($request){
  $obj	= App\Models\User::where('email', $request->email)->first();
	if($obj)
	{
    if(\Hash::check($request->password,$obj->password))
		{
			if($obj->status=='1')
			{
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        Session::put('user_id', $obj->id);
        Session::put('user_name', $obj->name);
        // Session::put('user_email',$obj->email);
				return true;
			}
			else
			{
        return false;
			}

		}
		else
		{
			return false;
		}
	}else{
    return false;

  }

}

function getCurrentUserData(){
  $value=Session::get('user_id');
  $data=App\Models\User::where('id',$value)->first();
  if($data){
    return $data;
  }else {
    return false;
  }
}

function updateprofile($request,$id){
  $profile=App\Models\User::find($id);
  $profile->name=$request->name;
  $profile->marital_status=$request->marital;
  $profile->dob=$request->dob;
  $profile->gender=$request->gender;
  $profile->about=$request->about;
  if($profile->save()){
    return true;
  }else {
    return false;
  }
}

function updateuseremail($request,$id){
  $profile=App\Models\User::find($id);
  $profile->email=$request->email;
  if($profile->save()){
    return true;
  }else {
    return false;
  }
}

function updatepassword($request,$id){
$userpass=App\Models\User::find($id);
if(\Hash::check($request->currentpassword,$userpass->password))
{
  $userpass->password=\Hash::make($request->password);
  if($userpass->save()){
    return true;
  }else{
    return false;
  }
}else{
  return false;
}
}
function logg_in()
{
  if (Session::has('user_id'))
  {
    return true;
  }
  else
  {
    return false;
  }
}
 ?>
