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
        $urlWithoutDomain = str_replace($domain, "", $request->url());
        $root = explode('/',$urlWithoutDomain);
        $lang = "unknow";
        if(count($root) > 1){
            $lang = $root[1];
        }
        else{
            $urlWithoutDomain = "/event";
        }
        $localizeUrl = '';

        if(!Lang::has('pages.lang', $lang, false)){
            if(Lang::has('pages.lang', Config::get('app.locale'), false)){
                $localizeUrl = $domain."/".Config::get('app.locale').$urlWithoutDomain;
            }
            else{
                $domain."/en".$urlWithoutDomain;
            }
            return redirect($localizeUrl);
        }

        return $next($request);
    }
}

