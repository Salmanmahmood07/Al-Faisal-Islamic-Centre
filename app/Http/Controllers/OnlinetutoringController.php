<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OnlineTutoring;
use App\Models\User;
use Validator,Redirect,Response,File;

class OnlinetutoringController extends Controller
{
	public function getallinvite(){
      $data['invite']=OnlineTutoring::all();
      if($data){
        return view('tutor.getallinvite',$data);
      }
    }

	public function show()
	{
		return view ('tutor.meetinginvite');
	}
	public function create_invitation(Request $request)
   {
   		  $obj=new OnlineTutoring();
        $obj->topic=$request->topic;
        $obj->description=$request->description;
        $obj->date=$request->date;
        $obj->meetingid=$request->meetingid;
        $obj->passcode=$request->passcode;
        $obj->meetingurl=$request->meetingurl;
        if($obj->save()){
          return Response::json(['success' => '1','message' => 'Meeting Invitation saved successfully']);
        }else{
          return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
        }
   }
   public function edit_invitation($id){
      $meeting=MeetingInvitation::find($id);
      return view('tutor.editmeeting')->with('meeting',$meeting);
    }

    public function update_invitation(Request $request)
    {
	      $id=$request->id;
	      if($obj){
	      $obj->content=$request->description;
	      if($obj->save()){
	        return Response::json(['success' => '1','message' => 'Meeting Invitation Updated successfully']);
	      }else{
	        return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
	      	}
	    }
	}
	public function destroy_invitation($id){
      
      $initation= OnlineTutoring::find($id);

    if($initation->delete()){
              return response()->json([
                  'success' => '1',
                  'message'=>'Imam image deleted seccessfully!'
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
