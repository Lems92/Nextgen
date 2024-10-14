<?php

namespace App\Http\Middleware;

use App\Models\Entreprise;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscriptionPermission
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle($request, Closure $next, $permission)
    {
        $user = Auth::user();

        if ($user) {
            $user->load('userable');

            if($user->userable_type == Entreprise::class) {
                $entreprise = $user->userable;
                // Vérifier les permissions directes ou via rôles
                if ($entreprise->hasPermissionTo($permission)) {
                    return $next($request);
                }

                // Vérifier les permissions via l'abonnement actif
                if ($entreprise->hasActiveSubscription() && $entreprise->subscription->permissions->contains('name', $permission)) {
                    return $next($request);
                }

            } else {
                return redirect('/')
                    ->with('error', "Vous n'avez pas la permission d'accéder à cette page.");
            }
        }

        return redirect('/')
            ->with('error', "Vous n'avez pas la permission d'accéder à cette page.");
    }
}
