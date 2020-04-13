<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AccessPetugas
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
        if(Auth::user()->hasAnyRole('petugas')) {
            return $next($request);
        }

        return redirect('home');
    }
}
