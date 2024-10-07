<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class InscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'type_compte' => 'required|in:etudiant,entreprise,service-carriere',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->type_compte,
        ]);

        // Rediriger vers une autre page ou retourner une réponse
        // return redirect()->route('home')->with('success', 'Inscription réussie');
    }

    public function create_user(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|confirmed',
                'type_compte' => 'required',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type_compte' => $request->type_compte,
                'etat_compte' => 'en attente',
            ]);

            if($request->type_compte == 'Université'){
                // $pays = Pays::all();
                // $regions = Region::all();
                // $contrats = Contrat::all();


                return redirect()->route('universitePage');

            } else {
                return redirect()->route('universitePage')->with('success', 'Inscription réussie');
            }

        }catch(ValidationException $e){
            return response()->json([
                'message' => 'Erreur de validation',
                'errors' => $e->errors(), // Récupérer les erreurs de validation
            ], 422); // Code 422 = Unprocessable Entity
        }





        // return redirect()->route('home')->with('success', 'Inscription réussie');
    }
}
