<?php

function registerTutor($request){
    $obj= new App\Models\User();
    $obj->name=$request->name;
    $obj->email=$request->email;
    $obj->password=\Hash::make($request->password);
    $obj->type = 'tutor';
    $obj->verifyToken = Hash::make(uniqid());
    $obj->role_id=1;
    $obj->status=1;
    if($obj->save()){
      return true;
    }else {
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
