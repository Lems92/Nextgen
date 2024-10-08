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
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Définir une redirection par défaut
            $route = '/';

            if ($user->hasRole('etudiant')) {
                $route = 'etudiant.dashboard';
            } elseif ($user->hasRole('entreprise')) {
                $route = 'entreprise.dashboard';
            } elseif ($user->hasRole('service-carriere')) {
                $route = 'service_carriere.dashboard';
            }

            return redirect()->route($route);
        }

        // Identifiants invalides
        return redirect()->route('connexion')->withErrors(['email' => 'Identifiants invalides']);
    }
}
