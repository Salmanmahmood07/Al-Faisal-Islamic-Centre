<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsPage extends Model
{
    public function imam()
    {
    	return $this->belongsTo(Imam::class);
    }
}
