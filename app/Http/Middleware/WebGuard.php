<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Session;

class WebGuard
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
        $forget_arr = ['user_name', 'user_id', 'is_admin', 'user_image', 'encrypted_password', 'user_email'];
        if ($request->session()->has('user_id')) {
            $id = $request->session()->get('user_id');
            $encrypted_password = $request->session()->get('encrypted_password');
            $email = $request->session()->get('user_email');
            $user = User::find($id);
            if (!$user || $user->password != $encrypted_password || $user->email != $email) {
                if (!$user) $request->session()->forget($forget_arr);
                if ($user->password != $encrypted_password) $request->session()->forget($forget_arr);
                if ($user->email != $email) $request->session()->forget($forget_arr);
            } else {
                User::updateInfo($user);
            }
            return $next($request);
        }
        return $next($request);
    }
}