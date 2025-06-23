<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Auth;

trait ChangeLanguage{
    public function language()
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
    }
}
