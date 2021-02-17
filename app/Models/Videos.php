<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    
    protected $table = "videos";
    protected $fillable = [
        'videotitle','description', 'category','video_embed_src','alttext'
    ];
   
}
