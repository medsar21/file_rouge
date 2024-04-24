<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmailVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && !$request->user()->hasVerifiedEmail()) {
            return redirect('/')->withErrors(['emailVerficationError' => 'You need to verify your email! <a href="' . route('verification.notice') . '">Click here</a> to verify it.']); // Redirect with error message
        }

        return $next($request);
    }
}
