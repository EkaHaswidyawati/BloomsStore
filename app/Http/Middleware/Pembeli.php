<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Pembeli
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'pembeli') {
                return redirect('/home');
            }
            else if (Auth::user()->role == 'penjual') {
                return redirect('/dashboardPenjual');
            }
        }
        else {
            return redirect('/')->withErrors('Silahkan Login Terlebih Dahulu');
        }
        return $next($request);
    }
}
