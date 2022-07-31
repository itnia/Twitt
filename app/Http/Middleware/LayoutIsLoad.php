<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LayoutIsLoad
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
        if (empty($request->input('layout'))) {
            return response()->view('layouts.main', ['url' => $request->path()]);
        }
        return $next($request);
    }
}