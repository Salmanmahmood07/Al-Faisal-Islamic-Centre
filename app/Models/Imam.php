<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imam extends Model
{
    public function getimages()
    {
    	return $this->hasMany(Imam_Image::class);
    }
    public function NewsPage()
    {
    	return $this->hasMany(NewsPage::class);
    }
}
