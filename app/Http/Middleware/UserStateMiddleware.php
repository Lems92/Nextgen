<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserStateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if(!$user->is_accepted_by_admin) {
            return redirect()->route('attente_verification_admin');
        }

        if(!$user->email_verified_at) {
            return redirect()->route('attente_verification_email');
        }

        return $next($request);
    }
}
