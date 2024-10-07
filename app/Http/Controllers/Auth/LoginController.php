<?php

// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try{
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                if($user->type_compte == 'Université'){
                    return redirect()->route('univ-dashboard');
                } else {
                    return redirect()->route('entreprise.tableau-de-bord');
                }
            }else{
            }
        }

        catch(ValidationException $e){
            return response()->json([
                'message' => 'Erreur de validation',
                'errors' => $e->errors(), // Récupérer les erreurs de validation
            ], 422); // Code 422 = Unprocessable Entity
        }

    }
}
