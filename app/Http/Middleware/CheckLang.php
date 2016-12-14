<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;

class CheckLang
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
        if (strpos($request->url(), '/en/') == false && strpos($request->url(), '/fr/') == false) {
            $domain = $request->root();
            $urlWithoutDomain = str_replace($domain, "", $request->url());
            $localizeUrl = $domain."/".Config::get('app.locale').$urlWithoutDomain;
            //dd($localizeUrl);
            return redirect($localizeUrl);
            //dd($request->root());
        }

        return $next($request);
    }
}
