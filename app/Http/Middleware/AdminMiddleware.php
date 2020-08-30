<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if(!auth()->user()) abort(404, 'Page Not Found!');

        if(!isAdmin()){
            if(!isWritter()) abort(404, 'Page Not Found!');
        }

        return $next($request);
    }
}
