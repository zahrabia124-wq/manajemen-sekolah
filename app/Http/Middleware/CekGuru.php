<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekGuru
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah sudah login DAN rolenya adalah Guru
        if (Auth::check() && Auth::user()->role === 'Guru') {
            return $next($request);
        }

        // Jika bukan guru, tolak akses atau lempar ke halaman login
        return redirect()->route('login')->with('error', 'Akses ditolak. Khusus Guru.');
    }
}
