<?php

namespace App\Http\Middleware;

use Closure, Session;
use Illuminate\Http\Request;

class CmsGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('is_admin')) {
            return $next($request);
        }
        return redirect('user/signin');
    }
}