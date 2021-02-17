<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IslamicTopicsReply extends Model
{

    public function islamictopics()
    {
        return $this->belongsTo('App\IslamicTopics');
    }
    public function user()
    {
        return $this->belongsTo('App\UserSetup');
    }
}
