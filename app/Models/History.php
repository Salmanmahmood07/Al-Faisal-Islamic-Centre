<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    public function getimages()
    {
    	return $this->hasMany(History_Image::class);
    }
}
