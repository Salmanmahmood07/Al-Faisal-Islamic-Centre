<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    protected $table = "user_roles";

    public function usersetup()
    {
        return $this->hasMany('App\UserSetup');
    }
}
