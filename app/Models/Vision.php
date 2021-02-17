<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vision extends Model
{
    public function getimages()
    {
    	return $this->hasMany(Vision_Image::class);
    }
}
