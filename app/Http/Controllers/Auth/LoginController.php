<?php

// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validation des données de connexion
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // Récupère l'utilisateur connecté
            $user = Auth::user();
            // Redirige en fonction du rôle
            switch ($user->role) {
                case 'etudiant':
                    return redirect()->route('etudiant.dashboard');
                case 'entreprise':
                    return redirect()->route('entreprise.tableau-de-bord');
                case 'service-carriere':
                    return redirect()->route('univ-dashboard');
                default:
                    return redirect()->route('connexion');
            }
        }

        // Identifiants invalides
        return redirect()->route('connexion')->withErrors(['email' => 'Identifiants invalides']);
    }
}
