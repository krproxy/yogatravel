<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Banned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isBanned()) {

            Auth::logout();
            return redirect('auth/login')->with('customModalMessage', 'Обратитесь к инструктору УФЙ для активации вашего профиля.');
        }

        return $next($request);
    }
}
