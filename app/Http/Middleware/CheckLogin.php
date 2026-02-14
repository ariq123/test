<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('login')) {
            if (Cookie::get('remember_login')) {
                session(['login' => true]);
            } else {
                // Pastikan rute '/login' ada di web.php (tadi di web.php kamu pakai '/')
                return redirect('/'); 
            }
        }
        return $next($request);
    }
}