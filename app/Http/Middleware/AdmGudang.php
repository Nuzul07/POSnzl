<?php

namespace App\Http\Middleware;

use Closure;

class AdmGudang
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
        if (\Auth::user()->level_id == 2 || \Auth::user()->level_id == 1) {
            return $next($request);
        }
        else {
            abort(403);
        }
    }
}
