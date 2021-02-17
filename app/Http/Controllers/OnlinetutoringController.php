<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeetingInvitation;
use Validator,Redirect,Response,File;
//use Zoom;

class OnlinetutoringController extends Controller
{
	public function getallinvite(){
      $data['invite']=MeetingInvitation::all();
      if($data){
        return view('admin.getallinvite',$data);
      }
    }

	public function show()
	{
		return view ('admin.meetinginvite');
	}
	public function create_invitation(Request $request)
   {
   		  $obj=new MeetingInvitation();
        $obj->topic=$request->topic;
        $obj->date=$request->start_time;
        $obj->agenda=$request->agenda;
        if($obj->save()){
          return Response::json(['success' => '1','message' => 'Meeting Invitation saved successfully']);
        }else{
          return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
        }
   }
   public function edit_invitation($id){
      $meeting=MeetingInvitation::find($id);
      return view('admin.editmeeting')->with('meeting',$meeting);
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
      
      $initation= MeetingInvitation::find($id);

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
