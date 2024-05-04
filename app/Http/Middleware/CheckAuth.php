<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // check wether the user is logged in or not
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->check()) {
            return $next($request);
        }

        return redirect()->to('/');
    }
}
