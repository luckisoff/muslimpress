<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
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
        $locale = $request->segment(1);

        if(!\in_array($locale, ['en', 'hi'])) abort(404, 'Page not found!');

        app()->setLocale($locale);

        $request->route()->forgetParameter('locale');

        return $next($request);
    }
}
