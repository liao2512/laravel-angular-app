<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && $request->user()->email != 'liao2512@gmail.com')
        {
            return redirect('/');
        }
        return $next($request);
    }
}
