<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isTutor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
          if(Auth::user()->type == 'tutor'){
              return $next($request);
          }
      }
       Auth::logout();
        return redirect('/tutor');
    }
}
