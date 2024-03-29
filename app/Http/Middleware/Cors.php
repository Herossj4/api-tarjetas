<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request)
       //Url a la que se le dar� acceso en las peticiones
      ->header("Access-Control-Allow-Origin", "*")
      //M�todos que a los que se da acceso
      ->header("Access-Control-Allow-Methods", "GET, POST")
      //Headers de la petici�n
      ->header("Access-Control-Allow-Headers", "*"); 
    }
}
