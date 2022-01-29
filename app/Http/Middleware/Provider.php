<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Provider
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
        if (auth()->user()->role == 'admin' || auth()->user()->role == 'sp') {
            return $next($request);
        } else {
            return redirect()->route('website')->with('error', 'Permission Denied.');
        }
    }
}
