<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Session::get('customer_id'))
        {
            return $next($request);
        }
        else
        {
            return redirect('/login-register')->with('message', 'Please Login First. If you did not create account before then create a account for yourself.');
        }
    }
}
