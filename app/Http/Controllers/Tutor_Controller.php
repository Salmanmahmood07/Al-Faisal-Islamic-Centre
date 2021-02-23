<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TutorSetup;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
use Session;
use Input;
use Response;
use Carbon\Carbon;
use App\Models\User;
use App\Models\UserRoles;
use Illuminate\Support\Facades\Crypt;

class Tutor_Controller extends Controller
{
    public function tutorlogin(){
      return view('tutor.login');
    }
    public function tutorsignup(){
      return view('tutor.signup');
    }
    public function dashboard(){
      return view('/tutor.dashboard');
    }
}
