<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Vérifier si l'utilisateur est connecté et possède le rôle requis
        if (Auth::check() && Auth::user()->hasAnyRole($roles)) {
            return $next($request);
        }

        return redirect('/')
            ->with('error', "Vous n'avez pas le rôle requis pour accéder à cette page.");
    }
}
