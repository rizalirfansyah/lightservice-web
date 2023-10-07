<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin{

public function handle(Request $request, Closure $next): Response
{
    if(auth()->user()->is_admin == 1){
        return $next($request);
    }

    return redirect()->back()->with('error',"You don't have admin access.");

    // return $next($request);}
    }
}