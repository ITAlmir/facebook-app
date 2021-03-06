<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AllreadyLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session()->has('loginId') && (url('/login')==$request->url() || url('/singup')==$request->url()
        || url('/info')==$request->url() || url('/about')==$request->url() || url('/')==$request->url()))
        {
            return back();
        }
        return $next($request);
    }
}
