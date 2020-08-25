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
        if(!auth()->user()) abort(404);

        $roles = ['admin', 'writter'];

        if(!\in_array(auth()->user()->role, $roles)) abort(404);

        return $next($request);
    }
}
