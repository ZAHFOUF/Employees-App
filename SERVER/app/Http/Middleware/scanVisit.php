<?php

namespace App\Http\Middleware;

use App\Models\Visitors;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class scanVisit
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

  /*      $ip = $request->ip();
        $path = $request->path();
        $search = json_encode( $request->all() ) ;
        $data = ['ip' => $ip , 'path' => $path , 'search' => $search] ;

       Visitors::create($data); */



        return $next($request);
    }
}
