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
            return redirect('auth/login')->with('customModalMessage', 'На данный момент Ваша учетная запись заблокирована, если Вы только зарегистрировадись - обратитесь к человеку пригласившему Вас для активации. ');
        }

        return $next($request);
    }
}
