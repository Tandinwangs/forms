<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
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

        if(Auth::user()->role->role != 'Administrator'){
            return redirect()->route('dashboard_path')->with(['status'=>'0','msg'=>'You do not have the permission to access the requested resource.']);
        }
        return $next($request);
    }
}
