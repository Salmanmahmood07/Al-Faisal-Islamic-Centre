<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Courses;
use App\Models\Projects;
use App\Models\BlogPost;
use App\Models\NewsPage;
use App\Models\Images;
use App\Models\Videos;
use App\Models\Imam;
use App\Models\User;
use App\Models\History;
use App\Models\Mission;
use App\Models\Vision;
use App\Models\Contact;
use App\Models\Imam_Image;
use App\Models\History_Image;
use App\Models\Mission_Image;
use App\Models\Vision_Image;
use App\Models\OnlineMeeting;
//use App\Models\MeetingInvitation;


class PagesController extends Controller
{
    public function services(){
      $data['services']=Services::all();
      return view('frontend.services',$data);
    }
    public function services_detail(Request $request){
      $id=$request->id;
      $data['service_detail']=Services::orderBy('id', 'desc')
      ->paginate(3);
      $detail=Services::where("id","=",$id)->first();
      return view('frontend.servicesdetail',$data)->with('detail',$detail);
    }
    public function courses(){
      $data['courses']=Courses::all();
      return view('frontend.courses',$data);
    }
    public  function courses_detail(Request $request){
      $id=$request->id;
      $data['courses_detail']=Courses::orderBy('id', 'desc')
      ->paginate(3);
      $detail=Courses::where("id","=",$id)->first();
      return view('frontend.coursesdetail',$data)->with('detail',$detail);
    }
    public function projects(){
      $data['projects']=Projects::all();
      return view('frontend.projects',$data);
    }
    public  function project_detail(Request $request){
      $id=$request->id;
      $data['project_detail']=Projects::orderBy('id', 'desc')
      ->paginate(3);
      $detail=Projects::where("id","=",$id)->first();
      return view('frontend.projectdetail',$data)->with('detail',$detail);
    }
    public function blog(){
      $data['posts']=BlogPost::all();
      return view('frontend.blog',$data);
    }
    public  function blog_detail(Request $request){
      $id=$request->id;
      $data['blog_detail']=BlogPost::orderBy('id', 'desc')
      ->paginate(3);
      $detail=BlogPost::where("id","=",$id)->first();
      return view('frontend.blogdetail',$data)->with('detail',$detail);
    }
    public function events(){
      $data['events']=Newspage::all();
      return view('frontend.events',$data);
    }
    public function event_detail(Request $request){
      $id=$request->id;
      $data['event_detail']=NewsPage::orderBy('id', 'desc')
      ->paginate(3);
      $detail=NewsPage::select("news_pages.id as id ","news_pages.title as title","news_pages.content as content","news_pages.image as newsimage","news_pages.venue as venue",
      "news_pages.time as time","news_pages.date as date","imams.imamname as imam","imams.designation as designation","imams.image as imamimage")
      ->join("imams","imams.id","=","news_pages.imam_id")
      ->where("news_pages.id" , "=" , $id)
      ->first();
      // dd($detail);
    //   $users = NewsPage::join('imams', 'news_pages.imam_id', '=','imams.id')
    // // ->join('orders', 'users.id', '=', 'orders.user_id')
    // ->select('news_pages.*', 'imams.imamname')->get();
    //   dd($users);
      return view('frontend.eventdetail',$data)->with('detail',$detail);
    }

    public function images(){
      $data['images']=Images::all();
      return view('frontend.images',$data);
    }
    public function videos(){
      $data['videos']=Videos::all();
      return view('frontend.videos',$data);
    }
    public function history(){
      $data['history']=History::all();
      $data['History_Image']=History_Image::all();
      $data['mission']=Mission::all();
      $data['Mission_Image']=Mission_Image::all();
      $data['vision']=Vision::all();
      $data['Vision_Image']=Vision_Image::all();
      return view('frontend.history',$data);
    }
    public function team(){
      $data['members']=Imam::all();
      return view('frontend.management',$data);
    }
    public  function team_detail(Request $request){
      $id=$request->id;
      $data['imams']=Imam_Image::where("imam_id","=",$id)->get();
      $data['team_detail']=Imam::orderBy('id', 'desc')
      ->paginate(3);
      $detail=Imam::where("id","=",$id)->first();
      return view('frontend.teamdetail',$data)->with('detail',$detail);
    }
    public function contact(){
      return view('frontend.contact');
    }
    public function comingsoon(){
      return view('frontend.comingsoon');
    }
    // public function onlinetutoring(){
    //   $data['invite']=MeetingInvitation::all();
    //   return view('frontend.onlinetutoring',$data);
    // }
    public function onlinetutoring(){
      $data['invites']=OnlineMeeting::all();
      return view('tutor.onlinetutoring',$data);
    }
    public function tutor(){
      $data['tutors']=User::where('type','=', 'tutor')->get();
      return view('tutor.tutor',$data);
    }
    public  function tutor_detail(Request $request){
      $id=$request->id;
      $data['invites']=OnlineMeeting::where("tutor_id","=",$id)->get();
      $data['tutors']=User::where("id","=",$id)->get();
      $data['tutor_detail']=User::where("type","=", "tutor")->get();

      return view('tutor.tutordetail',$data);
    }
}
