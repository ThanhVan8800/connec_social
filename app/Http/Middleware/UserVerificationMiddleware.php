<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserVerificationMiddleware
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
        if($request->user()->email != null && $request->user()->email_verified_at == null){
            return redirect()->route("verification.notice");
        }elseif($request->user()->mobile != null && $request->user()->mobile_verified_at == null){
            return redirect()->route("phone.verification.notice");
        }
        return $next($request);
    }
}
