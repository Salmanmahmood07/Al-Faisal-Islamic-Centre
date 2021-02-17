<?php

namespace App\Http\Controllers\Zoom;

use App\Http\Controllers\Controller;
use App\Traits\ZoomJWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\MeetingInvitation;
use Redirect,Response,File;


class MeetingController extends Controller
{
    use ZoomJWT;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function show()
	{
		$path = 'users/me/meetings';
		$response = $this->zoomGet($path);
		$data = json_decode($response->body(), true);
		$meetings = $data["meetings"];
        $join_url = '';
        if(!empty($data["meetings"]))
        {
            $join_url = $data["meetings"][0]["join_url"];
        }
        return view ('frontend.onlinetutoring', compact("join_url"));
	}

    public function list(Request $request) { 
    $path = 'users/me/meetings';
    $response = $this->zoomGet($path);

    $data = json_decode($response->body(), true);
    $data['meetings'] = array_map(function ($m) {
        $m['start_at'] = $this->toUnixTimeStamp($m['start_time'], $m['timezone']);
        return $m;
    }, $data['meetings']);

    return [
        'success' => $response->ok(),
        'data' => $data,
    ]; 
}
    public function create(Request $request) { 
    $validator = Validator::make($request->all(), [
        'topic' => 'required|string',
        'start_time' => 'required|date',
        'agenda' => 'string|nullable',
    ]);
     	
    if ($validator->fails()) {
        return [
            'success' => false,
            'data' => $validator->errors(),
        ];
    }
    	
    $data = $validator->validated();

    $path = 'users/me/meetings';
    $response = $this->zoomPost($path, [
        'topic' => $data['topic'],
        'type' => self::MEETING_TYPE_SCHEDULE,
        'start_time' => $this->toZoomTimeFormat($data['start_time']),
        'duration' => 30,
        'agenda' => $data['agenda'],
        'settings' => [
            'host_video' => false,
            'participant_video' => false,
            'waiting_room' => true,
        ]
    ]);//dd($response->body());

    //Data adding in database
    $obj=new MeetingInvitation();
        $obj->topic=$request->topic;
        $obj->date=$request->start_time;
        $obj->agenda=$request->agenda;
        $obj->save();
        if($obj->save()){
          return Response::json(['success' => '1','message' => 'Meeting Invitation saved successfully']);
        }else{
          return Response::json(['success' => '0','validation'=>'0','message' => 'Something is wrong. Please try again.']);
        }
    return [
        'success' => $response->status() === 201,
        'data' => json_decode($response->body(), true),
    ]; 
    
}
    public function get(Request $request, string $id) { 
    $path = 'meetings/' . $id;
    $response = $this->zoomGet($path);

    $data = json_decode($response->body(), true);
    if ($response->ok()) {
        $data['start_at'] = $this->toUnixTimeStamp($data['start_time'], $data['timezone']);
    }

    return [
        'success' => $response->ok(),
        'data' => $data,
    ]; 
}
    public function update(Request $request, string $id) { 
    $validator = Validator::make($request->all(), [
        'topic' => 'required|string',
        'start_time' => 'required|date',
        'agenda' => 'string|nullable',
    ]);

    if ($validator->fails()) {
        return [
            'success' => false,
            'data' => $validator->errors(),
        ];
    }
    $data = $validator->validated();

    $path = 'meetings/' . $id;
    $response = $this->zoomPatch($path, [
        'topic' => $data['topic'],
        'type' => self::MEETING_TYPE_SCHEDULE,
        'start_time' => (new \DateTime($data['start_time']))->format('Y-m-d\TH:i:s'),
        'duration' => 30,
        'agenda' => $data['agenda'],
        'settings' => [
            'host_video' => false,
            'participant_video' => false,
            'waiting_room' => true,
        ]
    ]);

    return [
        'success' => $response->status() === 204,
        'data' => json_decode($response->body(), true),
    ]; 
}
    public function delete(Request $request, string $id) { 
    $path = 'meetings/' . $id;
    $response = $this->zoomDelete($path);

    return [
        'success' => $response->status() === 204,
        'data' => json_decode($response->body(), true),
    ]; 
}
}
