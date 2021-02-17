<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imam_Image extends Model
{
	protected $table = "imam_images";
	protected $fillable = ['imam_id', 'image', 'alttext'];
    public function imam()
    {
    	return $this->belongsTo(Imam::class);
    }
}
