<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckApiAuth
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
        // Check if user is authenticated via our custom session
        if (!session('user') || !session('user.authenticated')) {
            // If not authenticated, redirect to login page
            return redirect('/login')->with('error', 'Please login to access this page.');
        }

        // If authenticated, proceed with the request
        return $next($request);
    }
}
