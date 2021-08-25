<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{

    public function handle(Request $request, Closure $next)
    {

       return (auth()->check() && auth()->user()->role_id != 2)
           ?  $next($request)
           :   redirect(route('index'))->with('unsuccess', 'YOU DONT HAVE ACCESS TO THIS PAGE');




    }
}
