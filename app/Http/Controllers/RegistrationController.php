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

        // on assigne un rôle à l'utilisateur
        $user->assignRole($validatedData['role']);

        // Authentifier l'utilisateur
        Auth::login($user);

        // Rediriger vers la page appropriée en fonction du rôle
        return match ($user->role) {
            'etudiant' => redirect()->route('inscription-etu'),
            'entreprise' => redirect()->route('form-entreprise'),
            'service-carriere' => redirect()->route('service.carriere'),
            default => redirect()->route('home'),
        };
    }
}
