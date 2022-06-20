<?php

namespace App\Http\Middleware;

use Closure;
use Igaster\LaravelTheme\Facades\Theme;

class SetTheme
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
        Theme::set('00001');
        return $next($request);
    }
}
