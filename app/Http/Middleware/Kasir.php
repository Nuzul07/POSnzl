<?php

namespace App\Http\Middleware;

use Closure;

class Kasir
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
        if (\Auth::user()->level_id == 3|| \Auth::user()->level_id == 1) {
            return $next($request);
        }
        else {
            abort(403);
        }
    }
}
