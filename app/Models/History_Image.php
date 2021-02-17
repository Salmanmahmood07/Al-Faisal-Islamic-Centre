<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History_Image extends Model
{	
	protected $table = "history_images";
	protected $fillable = ['history_id', 'image', 'alttext'];
    public function history()
    {
    	return $this->belongsTo(History::class);
    }
}
