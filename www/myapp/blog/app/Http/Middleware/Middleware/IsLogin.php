<?php

namespace App\Http\Middleware\Middleware;

use Closure;

class IsLogin
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

        if(!$request->session()->get('user')){

            return route('login');

        }else {

            return $next($request);
        }
    }
}
