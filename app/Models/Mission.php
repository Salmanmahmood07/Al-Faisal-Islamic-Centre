<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    public function getimages()
    {
    	return $this->hasMany(Mission_Image::class);
    }
}
