<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineMeeting extends Model
{
 //    protected $table = "online_meeting";
	// protected $fillable = ['tutor_id', 'topic', 'description', 'date', 'meetingid', 'passcode', 'meetingurl'];
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
