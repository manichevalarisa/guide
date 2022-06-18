<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class Language
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
        if($request->has('app_locale') && in_array($request->app_locale, app_languages_from_file())) {
            Session::put('app_locale', $request->app_locale);
            App::setLocale($request->app_locale);
        }
        else if (Session::has('app_locale') and in_array(Session::get('app_locale'), app_languages_from_file())) {
            App::setLocale(Session::get('app_locale'));
        }
        else {
            App::setLocale(Config::get('app.fallback_locale'));
        }
        return $next($request);
    }
}
