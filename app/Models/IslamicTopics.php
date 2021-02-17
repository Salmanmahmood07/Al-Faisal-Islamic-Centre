<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IslamicTopics extends Model
{
  public function islamictopicsreply()
  {
      return $this->hasMany('App\IslamicTopicsReply');
  }
  public function user()
  {
      return $this->belongsTo('App\UserSetup');
  }
}
