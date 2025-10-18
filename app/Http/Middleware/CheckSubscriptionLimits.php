<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSubscriptionLimits
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        
        if (!$user || !$user->hasRole('entreprise')) {
            return $next($request);
        }

        $entreprise = $user->userable;
        $subscription = $user->subscription;

        if (!$subscription) {
            return redirect()->route('entreprise.mon_abonnement')
                ->with('error', 'Vous devez avoir un abonnement actif pour accéder à cette fonctionnalité.');
        }

        // Vérifier les limites selon le type d'abonnement
        switch ($subscription->name) {
            case 'Standard':
                // Limite de 2 annonces par mois
                if ($request->route()->getName() === 'entreprise.offres.store') {
                    $currentMonth = now()->startOfMonth();
                    $offresCount = $entreprise->offres()
                        ->where('created_at', '>=', $currentMonth)
                        ->count();
                    
                    if ($offresCount >= 2) {
                        return redirect()->route('entreprise.offres')
                            ->with('error', 'Vous avez atteint la limite de 2 annonces pour ce mois avec votre abonnement Standard.');
                    }
                }
                // Limite de 10 profils vérifiés par mois
                if ($request->route()->getName() === 'entreprise.gerer-candidat') {
                    $currentMonth = now()->startOfMonth();
                    $verifiedCandidates = $entreprise->offres()
                        ->whereHas('etudiants', function ($query) use ($currentMonth) {
                            $query->whereHas('user', function ($q) {
                                $q->where('email_verified_at', '!=', null);
                            })
                            ->where('created_at', '>=', $currentMonth);
                        })
                        ->count();
                    
                    if ($verifiedCandidates > 10) {
                        return redirect()->route('entreprise.dashboard')
                            ->with('error', 'Vous avez atteint la limite de 10 profils vérifiés pour ce mois avec votre abonnement Standard.');
                    }
                }
                break;

            case 'Premium':
                // Limite de 5 annonces par mois
                if ($request->route()->getName() === 'entreprise.offres.store') {
                    $currentMonth = now()->startOfMonth();
                    $offresCount = $entreprise->offres()
                        ->where('created_at', '>=', $currentMonth)
                        ->count();
                    
                    if ($offresCount >= 5) {
                        return redirect()->route('entreprise.offres')
                            ->with('error', 'Vous avez atteint la limite de 5 annonces pour ce mois avec votre abonnement Premium.');
                    }

                    // Vérifier la mise en avant des annonces pour Premium
                    if ($request->has('mise_en_avant') && $request->input('mise_en_avant')) {
                        $featuredThisMonth = $entreprise->offres()
                            ->where('mise_en_avant', true)
                            ->where('created_at', '>=', $currentMonth)
                            ->exists();

                        if ($featuredThisMonth) {
                            return redirect()->route('entreprise.offres')
                                ->with('error', 'Vous ne pouvez avoir qu\'une seule annonce mise en avant par mois avec votre abonnement Premium.');
                        }
                    }
                }
                // Limite de 3 sélections shortlist VIP par mois
                if ($request->route()->getName() === 'entreprise.shortlist_vip') {
                    $currentMonth = now()->startOfMonth();
                    $vipSelections = $entreprise->offres()
                        ->whereHas('etudiants', function ($query) {
                            $query->where('status', 'recruited');
                        })
                        ->where('created_at', '>=', $currentMonth)
                        ->count();
                    
                    if ($vipSelections >= 3) {
                        return redirect()->route('entreprise.dashboard')
                            ->with('error', 'Vous avez atteint la limite de 3 sélections VIP ce mois-ci avec votre abonnement Premium.');
                    }
                }
                break;

            case 'Gold':
                // Pas de limites pour l'abonnement Gold
                break;
                
            default:
                // Gestion des abonnements invalides ou inconnus
                return redirect()->route('entreprise.mon_abonnement')
                    ->with('error', 'Type d\'abonnement non reconnu. Veuillez contacter le support technique.');
        }

        return $next($request);
    }
} 