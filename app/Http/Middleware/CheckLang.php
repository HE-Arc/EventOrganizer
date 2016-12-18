<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;

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


        //Don't check if lang is invalid
        $domain = $request->root();
        $browserLang = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0,2);
        $urlWithoutDomain = str_replace($domain, "", $request->url());
        $root = explode('/',$urlWithoutDomain);

        if(count($root) > 1){
            $lang = $root[1];

        }
        else{
            return redirect("/event");
        }



        if(!Lang::has('pages.lang', $lang, false)){
            if(Lang::has('pages.lang', $browserLang, false)){

                $localizeUrl = $domain."/".$browserLang.$urlWithoutDomain;
            }
            else{
                $localizeUrl = $domain."/en".$urlWithoutDomain;
            }
            return redirect($localizeUrl);
        }

        return $next($request);
    }
}

