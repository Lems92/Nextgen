<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        $role = $request->input('role');

        // Redirect based on role
        switch ($role) {
            case 'etudiant':
                return redirect()->route('inscription-etu');
            case 'entreprise':
                return redirect()->route('form-entreprise');
            case 'service-carriere':
                return redirect()->route('service.carriere');
            default:
                return redirect()->back()->with('error', 'Veuillez sélectionner un rôle.');
        }
    }
}
?>