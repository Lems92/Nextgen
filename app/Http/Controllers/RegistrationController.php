<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Assurez-vous que le modèle User est importé

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'role' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'], // Ajoutez cette colonne à votre table users
        ]);

        // Authentifier l'utilisateur
        Auth::login($user);

        // Rediriger vers la page appropriée en fonction du rôle
        switch ($user->role) {
            case 'etudiant':
                return redirect()->route('inscription-etu');
            case 'entreprise':
                return redirect()->route('form-entreprise');
            case 'service-carriere':
                return redirect()->route('service.carriere');
            default:
                return redirect()->route('home');
        }
    }
}
