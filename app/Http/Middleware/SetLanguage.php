<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\App;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $languages=['az','en','ru'];
        if($request->language && in_array($request->language,$languages))
        {
             $_COOKIE['language']=$request->language;
            setcookie("language", $request->language, time() + (20 * 365 * 24 * 60 * 60), "/", NULL);
        }
        \App::setLocale($_COOKIE['language'] ?? 'en');
        return $next($request);
    }
}
