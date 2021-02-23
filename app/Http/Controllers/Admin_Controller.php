<?php
namespace App\Http\Controllers;

use App\Models\AdminSetup;
use App\Models\User;
use App\Models\UserRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use DB;
use Session;
use Input;
use Response;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\NewsPage;
use App\Models\IslamicTopics;
use App\Models\IslamicTopicsReply;
use Carbon\Carbon;
use Image;
use App\Models\Imam;

class Admin_Controller extends Controller
{
    public function index(){
      return view('admin.login');
    }

    public function admin_authenticate(Request $request){
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
      $data = User::where([['email','=',$request->email],['type','=','admin']])->first();
      if($data){
        if(\Hash::check($request->password, $data->password))
        {
          Auth::attempt(['email' => $request->email, 'password' => $request->password]);
         Session::put('admin_id', $data->id);
         Session::put('admin_name', $data->name);
         Session::put('email', $data->email);
         Session::put('image', $data->image);
         return redirect('/admin/dashboard');
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
        // $data['recent']=IslamicTopics::select("islamic_topics.subject as topicsubject","users.name as username")
        // ->join("users","users.id","=","islamic_topics.user_id");
        $data['gettopics']=IslamicTopics::select("islamic_topics.subject as sub","users.name as username","islamic_topics.created_at")
            ->join("users","users.id","=","islamic_topics.user_id")
             ->orderBy('islamic_topics.id', 'desc')
            ->paginate(5);
            $today=Carbon::now();
        return view('/admin.dashboard')->with($data)->with('today',$today);
    }

    public function users(){
        $data['users']=User::all();
        return view('admin.users',$data);
    }

    public function newspage(){

        $data['title']="Menu";
        $data['speaker']=Imam::all();
        return view('admin.newspage',$data);
    }

    public function addnews(Request $request){
    request()->validate([
    'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $obj=new NewsPage();
    $obj->title=$request->title;
    $obj->content=$request->content;
    // $obj->category=$request->category;
    $image=$request->images;
    if(!empty($image))
    {
      $destinationPath =public_path().'/assets/events/';
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
        $obj->image=$filename;
        $obj->imam_id=$request->speaker;
        $obj->venue=$request->venue;
        $obj->date=$request->date;
        $obj->time=$request->time;
        $obj->status=$request->newsstatus;

          if($obj->save()){
            return Response::json(['success' => '1','message' => 'Event added successfully']);

          }
          else {
            return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);

          }
      }
}

    public function getNews(){
      $data['news']=getNews();
      if($data){
        return view('admin.newssetting',$data);
      }
    }

    public function editnews($id){
      $news=NewsPage::find($id);
      $data['imam']=Imam::all();
      return view('admin.editnews',$data)->with('news',$news);
    }

    public function newsedit(Request $request){
      $id=$request->id;
      $obj=NewsPage::find($id);
      $obj->title=$request->title;
      $obj->content=$request->content;
      $image=$request->images;
        
        if(!empty($image))
        {
        @unlink(public_path().'/assets/events/'.$obj->image);
        @unlink(public_path().'/assets/events/thumb/'.$obj->image);
        }
      if(!empty($image))
    {
      $destinationPath =public_path().'/assets/events/';
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
        $obj->image=$filename;
        
      }
          
          $obj->imam_id=$request->speaker;
          $obj->venue=$request->venue;
          $obj->date=$request->date;
          $obj->time=$request->time;
          $obj->status=$request->newsstatus;

            if($obj->save()){
            return Response::json(['success' => '1','message' => 'Event Updated successfully']);

          }
          else {
            return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);

          }
        
        return Response::json(['success' => '0','validation'=>'0','message' => 'Image is required.']);
    }

    public function destroy($id){
        $file=NewsPage::find($id);

        @unlink(public_path().'/assets/events/'.$file->image);
        @unlink(public_path().'/assets/events/thumb/'.$file->image);
        
        if($file->delete())
        {
          return response()->json([
            'success' => '1',
            'message'=>'Event deleted seccessfully!'
          ]);
        }else{
          return response()->json([
            'success' => '0',
            'message'=>'Something is wrong'
          ]);
        }
    }
    // public function changeuserrole(Request $request){
    //   $id=$request->userselect;
    //   $obj=UserSetup::find($id);
    //   // dd($obj);
    //   // return $obj;
    //   $obj->role_id=2;
    //   if($obj->save()){
    //     // dd();
    //     return Response::json(['success' => '1','message' => 'Become Moderated successfully']);
    //   }
    //   else
    //   {
    //    return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
    //   }
    // }

    // public function changerole(){
    //
    //     $role=getuser();
    //     return view('admin/userrole')->with('role',$role);
    //
    //
    // }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin');
    }
}
