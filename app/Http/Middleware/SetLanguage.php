<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $language = auth()->user()->language;

            if ($language === 'eng' || $language === 'en') {
                app()->setLocale('eng');
            } elseif ($language === 'ara' || $language === 'ar') {
                app()->setLocale('ara');
            } else {
                app()->setLocale(config('app.locale'));
            }
        } else {
            app()->setLocale(config('app.locale'));
        }

        return $next($request);
    }
}
