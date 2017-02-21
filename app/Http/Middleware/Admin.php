<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class Admin
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
        //return $next($request);

        /*
         * EXPLICAT PERFECTE EL MIDDLEWARE ADMIN
         * https://laracasts.com/discuss/channels/laravel/user-admin-authentication
         */

        if (Auth::check() && Auth::user()->isAdmin())
        {
            return $next($request);
        }

        alert()->error('Sols els administradors poden accedir a aquesta ruta!', 'No tens suficients privilegis')->autoclose(1500)->persistent('Tancar');
        return redirect('portada');
    }
}
