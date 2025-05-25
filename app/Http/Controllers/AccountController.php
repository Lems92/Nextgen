<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password as PasswordRule;

class AccountController extends Controller
{
    public function delete(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        $user = Auth::user();

        // Vérification du mot de passe
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Mot de passe incorrect.']);
        }

        // Suppression du userable (profil lié) si existe
        if ($user->userable) {
            $user->userable->delete();
        }

        // Déconnexion et suppression du compte
        Auth::logout();
        $user->delete();

        // Redirection vers la page d'accueil avec message
        return redirect()->route('accueil')->with('success', 'Votre compte a bien été supprimé.');
    }

    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', PasswordRule::defaults()],
        ]);

        $user = $request->user();
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Mot de passe changé avec succès.');
    }
}
