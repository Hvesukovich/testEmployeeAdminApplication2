<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginAdmin
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
//        if ((!isset($_SESSION['login'])) || ($_SESSION['login'] != true)) {
//            return redirect('/login');
//        }

        return $next($request);
    }
}
