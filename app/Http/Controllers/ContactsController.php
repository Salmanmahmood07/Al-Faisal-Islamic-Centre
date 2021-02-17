<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Contact;
use Validator,Redirect,Response,File;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    public function showcontact(){
      $data['contact']=Contact::all();
      if($data){
      return view('admin.getallcontacts',$data);
    }
  }
     
  public function storecontact (Request $request){
    
    $data = $this->validate($request, [
                'name' => 'required',
                'countrycode' => 'required',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required'
            ]);
    
        $obj=new Contact();
        $obj->name=$request->name;
        $obj->email=$request->email;
        $obj->countrycode=$request->countrycode;
        $obj->phone=$request->phone;
        $obj->subject=$request->subject;
        $obj->message=$request->message;

            if($obj->save() == true){

              $admin_email = 'alfaisalcentre1@gmail.com';
              Mail::to($admin_email)->send(new ContactMail($data));

              return Response::json(['success' => '1','message' => 'Message delivered successfully']);

            }
            else {
              return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);

            }
  }
}
