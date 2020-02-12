<?php

namespace App\Http\Middleware;

use Closure;

class SpeechFilter
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
        $forbiddenWords = ['hate', 'idiot', 'stupid'];
        $commentWords = explode(" ", $request->content);
        foreach ($commentWords as $key1 => $value1) {
            foreach ($forbiddenWords as $key2 => $value2) {
                if ($value1 == $value2) {
                    return response(view('elements.forbidden'));//ako ima zabranjenih reci, salji na forbidden blade
                }
            }
        }
        return $next($request);//ako je sve ok, pusti komentar da ide dalje
    }
}
