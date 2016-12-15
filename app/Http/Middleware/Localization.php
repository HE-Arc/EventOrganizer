<?php

namespace App\Http\Middleware;

use Closure;

class Localization
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
        $lang = $request->route()->parameter('lang');

        if($lang){
            \App::setLocale($lang);
        }



        //View::share('lang', 'fr');
        return $next($request);
    }
}




