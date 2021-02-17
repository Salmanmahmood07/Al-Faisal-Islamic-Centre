<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vision_Image extends Model
{
    protected $table = "vision_images";
	protected $fillable = ['vision_id', 'image', 'alttext'];
    public function vision()
    {
    	return $this->belongsTo(Vision::class);
    }
}
