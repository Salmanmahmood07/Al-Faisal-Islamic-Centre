<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Zoom\MeetingController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/', function () {
    return [
        'result' => true,
    ];
});

// Get list of meetings.
 Route::get('/meetingsl',[MeetingController::class,'list']);
 // Show page of online turtoring
 Route::get('/onlinetutoring',[MeetingController::class,'show']);
// Create meeting room using topic, agenda, start_time.
Route::post('/meetingsc', [MeetingController::class,'create']);
// Get information of the meeting room by ID.
Route::get('/meetingsg/{id}', [MeetingController::class,'get'])->where('id', '[0-9]+');

Route::patch('/meetingsp/{id}', [MeetingController::class,'update'])->where('id', '[0-9]+');
Route::delete('/meetingsd/{id}', [MeetingController::class,'delete'])->where('id', '[0-9]+');
