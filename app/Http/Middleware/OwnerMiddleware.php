<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use App\Registration;

class OwnerMiddleware
{
    public function handle($request, Closure $next)
    {
        $registration = Registration::findOrFail($request->route('id'));
        
        if (Auth::user()->id != $registration->user_id)
        {
            return redirect('/misinscripciones');
        }
        return $next($request);
    }
}
