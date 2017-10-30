<?php

namespace App\Http\Middleware;

use Closure;

class ElFinder
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
        \Config::set('elfinder.dir', 'a');
        return $next($request);
    }
}
