<?php

// app/Http/Middleware/CheckEntrepriseId.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckEntrepriseId
{
    public function handle(Request $request, Closure $next)
    {
        // Assure-toi que l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('connexion');
        }

        // Récupère l'ID de l'entreprise de la session
        $entrepriseId = $request->session()->get('entreprise_id');

        if (!$entrepriseId) {
            return redirect()->route('connexion')->withErrors(['error' => 'ID de l\'entreprise non trouvé dans la session.']);
        }

        // Vérifie si l'utilisateur est associé à cette entreprise
        $user = Auth::user();
        if (!$user->entreprise || $user->entreprise->id != $entrepriseId) {
            return redirect()->route('connexion')->withErrors(['error' => 'L\'utilisateur n\'est pas associé à cette entreprise.']);
        }

        return $next($request);
    }
}

