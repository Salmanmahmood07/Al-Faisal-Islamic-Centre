<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Admin_Controller;
use App\Http\Controllers\BlogPostsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ImagesCategoryController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ImamsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\VideoCategoryController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\VisionController;
use App\Http\Controllers\YearlyController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\OnlinetutoringController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('language/{lang}', function($lang){
  \session::put('locale', $lang);
  return redirect()->back();
})->middleware('language');

Route::get('/w', function () {
    return view('welcome');
});
Route::get('/',[MainController::class,'index']);

Route::get('/admin', [Admin_Controller::class, 'index']);
Route::post('/admin/admin_authenticate', [Admin_Controller::class, 'admin_authenticate']);
Route::get('/admin/logout', [Admin_Controller::class, 'logout']);

Route::group(['middleware' => ['isAdmin'], 'prefix' => 'admin'], function () {
  
  Route::get('/dashboard', [Admin_Controller::class, 'dashboard']);
  Route::get('/users', [Admin_Controller::class, 'users']);
  Route::get('/newspage', [Admin_Controller::class, 'newspage']);
  Route::post('/addnews', [Admin_Controller::class, 'addnews']);
  Route::get('/newslist', [Admin_Controller::class, 'getNews']);
  Route::get('/editnews/{id}', [Admin_Controller::class, 'editnews']);
  Route::post('/newsedit', [Admin_Controller::class, 'newsedit']);
  Route::post('/newsdel/{id}', [Admin_Controller::class, 'destroy']);
  Route::get('/getallcontacts', [ContactsController::class, 'showcontact']);
  //Route::get('/getallcontacts', [ContactsController::class, 'index']);
  
  Route::get('/imagecategory', [ImagesCategoryController::class, 'imagecategory']);
  Route::post('/addimagecategory', [ImagesCategoryController::class, 'addimagecategory']);
  Route::get('/getallimages', [ImagesController::class, 'getAllImages']);
  Route::get('/addimages', [ImagesController::class, 'addimages']);
  Route::post('/postimage', [ImagesController::class, 'postimage']);
  Route::get('/editimage/{id}', [ImagesController::class, 'editimage']);
  Route::post('/updateimages', [ImagesController::class, 'updateimages']);
  Route::post('/imagedel/{id}', [ImagesController::class, 'destroy']);

  Route::get('/videos', [VideosController::class, 'videos']);
  Route::get('/addvideo', [VideosController::class, 'addvideo']);
  Route::post('/postvideo', [VideosController::class, 'postvideo']);
  Route::get('/editvideos/{id}', [VideosController::class, 'editvideos']);
  Route::post('/videoedit', [VideosController::class, 'videoedit']);
  Route::post('/videodel/{id}', [VideosController::class, 'destroy']);
  Route::post('/addvideocategory', [VideoCategoryController::class, 'addvideocategory']);
  
  Route::get('/addservices', [ServicesController::class, 'addservices']);
  Route::post('/postservice', [ServicesController::class, 'postservice']);
  Route::get('/allservices', [ServicesController::class, 'getAllServices']);
  Route::get('/editservice/{id}', [ServicesController::class, 'editservice']);
  Route::post('/servicesedit', [ServicesController::class, 'updateservice']);
  Route::post('/servicedelete/{id}', [ServicesController::class, 'destroy']);

  Route::get('/addcourses', [CoursesController::class, 'addcourses']);
  Route::post('/postcourse', [CoursesController::class, 'postcourse']);
  Route::get('/allcourses', [CoursesController::class, 'getAllCourses']);
  Route::get('/editcourse/{id}', [CoursesController::class, 'editcourse']);
  Route::post('/coursesedit', [CoursesController::class, 'updatecourse']);
  Route::post('/coursedelete/{id}', [CoursesController::class, 'destroy']);

  Route::get('/addproject', [ProjectsController::class, 'addproject']);
  Route::post('/postproject', [ProjectsController::class, 'postproject']);
  Route::get('/allprojects', [ProjectsController::class, 'getAllProjects']);
  Route::get('/editproject/{id}', [ProjectsController::class, 'editproject']);
  Route::post('/projectedit', [ProjectsController::class, 'updateproject']);
  Route::post('/projectdelete/{id}', [ProjectsController::class, 'destroy']);

  Route::get('/addpost', [BlogPostsController::class, 'addpost']);
  Route::post('/addblogpost', [BlogPostsController::class, 'addblogpost']);
  Route::get('/allblogposts', [BlogPostsController::class, 'getallposts']);
  Route::get('/editblogpost/{id}', [BlogPostsController::class, 'editpost']);
  Route::post('/blogpostsedit', [BlogPostsController::class, 'updatepost']);
  Route::post('/postdelete/{id}', [BlogPostsController::class, 'destroy']);


  Route::get('/addimam', [ImamsController::class, 'addimam']);
  Route::post('/imamadd', [ImamsController::class, 'imamadd']);
  Route::get('/getallimams', [ImamsController::class, 'getallimams']);
  Route::get('/editimam/{id}', [ImamsController::class, 'editimam']);
  Route::post('/imamedit', [ImamsController::class, 'updateimam']);
  Route::post('/imamdelete/{id}', [ImamsController::class, 'destroy']);
  Route::get('/addimamimage/{id}', [ImamsController::class, 'adddimam']);
  Route::post('/addimage', [ImamsController::class, 'addimage']);
  Route::get('/getallimamimages/{id}', [ImamsController::class, 'getallimages']);
  Route::get('/editimamimages/{id}', [ImamsController::class, 'addimamimg']);
  Route::post('/updateimage', [ImamsController::class, 'updateimage']);
  Route::post('/imamimagedelete/{id}', [ImamsController::class, 'destroyimage']);

  Route::get('/allhistory', [HistoryController::class, 'history']);
  Route::get('/addhistory', [HistoryController::class, 'addhistory']);
  Route::post('/savehistory', [HistoryController::class, 'savehistory']);
  Route::post('/updatehistory', [HistoryController::class, 'updatehistory']);
  Route::get('/edithistory/{id}', [HistoryController::class, 'edithistory']);
  Route::get('/addhistoryimages/{id}', [HistoryController::class, 'adddhist']);
  Route::post('/addhistimage', [HistoryController::class, 'addhistimage']);
  
  Route::get('/addmission', [MissionController::class, 'addmission']);
  Route::post('/savemission', [MissionController::class, 'savemission']);
  Route::post('/updatemission', [MissionController::class, 'updatemission']);
  Route::get('/editmission/{id}', [MissionController::class, 'editmission']);
  Route::get('/addmissionimages/{id}', [MissionController::class, 'adddmiss']);
  Route::post('/addmissimage', [MissionController::class, 'addmissimage']);

  Route::get('/addvision', [VisionController::class, 'addvision']);
  Route::post('/savevision', [VisionController::class, 'savevision']);
  Route::post('/updatevision', [VisionController::class, 'updatevision']);
  Route::get('/editvision/{id}', [VisionController::class, 'editvision']);
  Route::get('/addvisionimages/{id}', [VisionController::class, 'adddvis']);
  Route::post('/addvisimage', [VisionController::class, 'addvisimage']);

  Route::get('/meetinginvite',[OnlinetutoringController::class, 'show']);
  // Route::post('/create_invitation',[OnlinetutoringController::class, 'create_invitation']);
  Route::get('/getallinvite',[OnlinetutoringController::class, 'getallinvite']);
  Route::get('/edit_invitation/{id}',[OnlinetutoringController::class, 'edit_invitation']);
  Route::post('/update_invitation',[OnlinetutoringController::class, 'update_invitation']);
  Route::post('/destroy_invitation/{id}',[OnlinetutoringController::class, 'destroy_invitation']);

   Route::get('/zoom',[OnlinetutoringController::class, 'create_meeting']);

  // Route::get('/changerole', [Admin_Controller::class, 'changerole']);
  // Route::post('/userrolechange', [Admin_Controller::class, 'changeuserrole']);
});

//Route::group(['prefix'=>'user'],function(){
	Route::prefix('user')->group(function () {

  Route::post('/signup', [MainController::class, 'userSignUp']);
  Route::get('/dashboard', [MainController::class, 'dashboard']);
  Route::post('/authenticate-user', [MainController::class, 'login_user']);
  Route::get('/updateprofile/{id}', [MainController::class, 'updateprofile']);
  Route::post('/profileupdate/{id}', [MainController::class, 'profileupdate']);
  Route::get('/accountsettings/{id}', [MainController::class, 'accounts']);
  Route::post('/addemail/{id}', [MainController::class, 'addemail']);
  Route::post('/changepassword/{id}', [MainController::class, 'changepassword']);
  Route::get('/logout', [MainController::class, 'logout']);
  Route::get('/forum', [MainController::class, 'forumdashboard']);
  Route::get('/newtopic', [MainController::class, 'forumnewtopic']);
  Route::post('/postquestion', [MainController::class, 'postquestion']);
  Route::get('/singlequestion/{id}', [MainController::class, 'singlequestion']);
  Route::post('/postreply/{id}', [MainController::class, 'postreply']);
 
});
	Route::get('/events', [PagesController::class, 'events']);
	Route::get('/event_detail/{id}', [PagesController::class, 'event_detail']);
	Route::get('/services', [PagesController::class, 'services']);
	Route::get('/services_detail/{id}', [PagesController::class, 'services_detail']);
	Route::get('/courses', [PagesController::class, 'courses']);
	Route::get('/courses_detail/{id}', [PagesController::class, 'courses_detail']);
	Route::get('/upcomingprojects', [PagesController::class, 'projects']);
	Route::get('/project_detail/{id}', [PagesController::class, 'project_detail']);
	Route::get('/blog', [PagesController::class, 'blog']);
	Route::get('/blog_detail/{id}', [PagesController::class, 'blog_detail']);
	Route::get('/images', [PagesController::class, 'images']);
	Route::get('/videos', [PagesController::class, 'videos']);
  Route::get('/history', [PagesController::class, 'history']);
	Route::get('/team', [PagesController::class, 'team']);
  Route::get('/team_detail/{id}', [PagesController::class, 'team_detail']);
  Route::get('/contact', [PagesController::class, 'contact']);
  Route::post('/storecontact', [ContactsController::class, 'storecontact']);

  Route::get('/comingsoon', [PagesController::class, 'comingsoon']);

  Route::get('/onlinetutoring',[PagesController::class, 'onlinetutoring']);