<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventBackHistory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Menambahkan header keamanan agar browser tidak menyimpan cache halaman sensitif
        return $response->header('Cache-Control','no-store, no-cache, must-revalidate, max-age=0')
                        ->header('Cache-Control','post-check=0, pre-check=0', false)
                        ->header('Pragma','no-cache')
                        ->header('Expires','0');
    }
}