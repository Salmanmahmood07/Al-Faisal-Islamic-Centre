<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission_Image extends Model
{
    protected $table = "mission_images";
	protected $fillable = ['mission_id', 'image', 'alttext'];
    public function mission()
    {
    	return $this->belongsTo(Mission::class);
    }
}
