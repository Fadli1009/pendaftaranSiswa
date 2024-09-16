<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LevelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $level): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu');
        }
        $userLevel = Auth::user()->id_level;
        $allowLevels  = [
            'Administrator' => 1,
            'PIC' => 2,
            'Admin Aplikasi' => 3
        ];

        if (isset($allowLevels[$level]) && $userLevel === $allowLevels[$level]) {
            return $next($request);
        }
        if (in_array($level, array_keys($allowLevels))) {
            return redirect()->route('dashboard')->with('error', 'anda tidak memiliki hak akses');
        } else {
            return redirect()->route('dashboard')->with('error', 'anda tidak memiliki hak akses');
        }
    }
}
