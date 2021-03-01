<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OnlineMeeting;
use App\Models\User;
use Session;
use Validator,Redirect,Response,File;

class OnlinetutoringController extends Controller
{
	public function getallinvite(){

      $value=Session::get('tutor_id');
      $data['invite']=OnlineMeeting::where("tutor_id", "=", $value)->get();
      //$tutor=User::where('id', $data)->first();
      
      if($data){
        return view('tutor.getallinvite',$data);
      }
    }

	public function show()
	{
    $value=Session::get('tutor_id');
    $tutor=User::where('id', $value)->first();
    //dd($tutor);
		return view ('tutor.meetinginvite')->with('tutor',$tutor);
	}
	public function create_invitation(Request $request)
   {
   		  $obj=new OnlineMeeting();
        $obj->tutor_id=Session::get('tutor_id');
        $obj->topic=$request->topic;
        $obj->description=$request->description;
        $obj->date=$request->start_time;
        $obj->meetingid=$request->meetingid;
        $obj->passcode=$request->passcode;
        $obj->meetingurl=$request->meetingurl;
        //dd($obj);
        if($obj->save()){
          return Response::json(['success' => '1','message' => 'Meeting Created Successfully']);
        }else{
          return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
        }
   }
   public function edit_invitation($id){
    
      $getinvite=OnlineMeeting::find($id);
      return view('tutor.editmeetinginvite')->with('getinvite',$getinvite);
    }

    public function update_invitation(Request $request)
    {
	      $id=$request->id;
        $obj=OnlineMeeting::find($id);
        $obj->tutor_id=Session::get('tutor_id');
        $obj->topic=$request->topic;
        $obj->description=$request->description;
        $obj->date=$request->start_time;
        $obj->meetingid=$request->meetingid;
        $obj->passcode=$request->passcode;
        $obj->meetingurl=$request->meetingurl;
	      
	      if($obj->save()){
	        return Response::json(['success' => '1','message' => 'Meeting Invitation Updated successfully']);
	      }else{
	        return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
	      	}
	    }

	public function destroy_invitation($id){
      
      $initation= OnlineMeeting::find($id);

    if($initation->delete()){
              return response()->json([
                  'success' => '1',
                  'message'=>'Meeting deleted seccessfully!'
                ]);
           }
           else{
             return response()->json([
                 'success' => '0',
                 'message'=>'Something is wrong'
               ]);
          }

    }
   
}
