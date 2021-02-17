<?php

function registerpage($request){
    $obj= new App\Models\NewsPage();
    $obj->title=$request->title;
    $obj->content=$request->content;
    $obj->status=$request->newsstatus;
    $obj->date=$request->date;
    if($obj->save()){
      return true;
    }else {
      return false;
    }
}

function getNews(){
  $news=App\Models\NewsPage::all();
  return $news;
}

function newsedit($request,$id){
  $obj=App\Models\NewsPage::find($id);
  $obj->title=$request->title;
  $obj->content=$request->content;
  $obj->image=$filename;
  $obj->status=$request->newsstatus;
  $obj->date=$request->date;
  if($obj->save()){
    return true;
  }else {
    return false;
  }
}

function videos(){
  $videos=App\Models\Videos::all();
  return $videos;
}

function videoedit($request,$id){
  $obj=App\Models\Videos::find($id);
  $obj->videotitle=$request->title;
  $obj->description=$request->description;
  $obj->category=$request->category;
  $obj->video_embed_src=$request->videoembed;
  $obj->alttext=$request->alttext;
  if($obj->save()){
    return true;
  }else {
    return false;
  }
}

function addimagecategory($request){
  $obj=new App\Models\ImageCategory();
  $obj->categorytitle=$request->imgcategorytitle;
  if($obj->save()){
    return true;
  }else {
    return false;
  }
}

function addvideocategory($request){
  $obj=new App\Models\VideoCategory();
  $obj->categorytitle=$request->videocategorytitle;
  if($obj->save()){
    return true;
  }else {
    return false;
  }
}

function countimams(){
  $count=App\Models\Imam::count();
  if($count)
  return $count;
  else return false;
}

function countcourses(){
  $courses=App\Models\Courses::count();
  if($courses)return $courses;
  else return false;
}

function countservices(){
  $count=App\Models\Services::count();
  if($count)return $count;
  else return false;
}

function countusers(){
  $count=App\Models\User::where('type','=','user')->count();
  if($count)return $count;
  else return false;
}

function countprojects(){
  $count=App\Models\Projects::count();
  if($count)return $count;
  else return false;
}

function countblogposts(){
  $count=App\Models\BlogPost::count();
  if($count)return $count;
  else return false;
}

function countnews(){
  $count=App\Models\NewsPage::count();
  if($count)return $count;
  else return false;
}

function countvideos(){
  $count=App\Models\Videos::count();
  if($count)return $count;
  else return false;
}

function countcontact(){
  $count=App\Models\Contact::count();
  if($count)return $count;
  else return false;
}


// function getUserRoles($user_role = false){
// 	if($user_role){
// 		$roles = App\Models\UserSetup::all();
// 	}
// 	else{
// 		$roles = App\Models\UsersProfileType::where('name' ,'!=', 'admin')->get();
// 	}
//
// 	return $roles;
// }


  //

 ?>
