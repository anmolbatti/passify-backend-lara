<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if ($user != null || $user != "") {
            $userRole = $user->role;
            if ($userRole == "Admin") {
                app()->setlocale('en');
                return $next($request);
            } else {
                return redirect()->back()->with('danger', 'You are not admin.');
            }
        } else {
            return redirect()->route('login.index')->with('danger', 'User not found.');
        }
    }
}
