<?php

namespace App\Http\Middleware;

use Closure;

class AdmUtama
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
        if (\Auth::user()->level_id != "1") {
            abort(403);
        }
        return $next($request);
    }
}
