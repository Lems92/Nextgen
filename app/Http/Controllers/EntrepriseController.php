<?php

// app/Http/Controllers/EntrepriseController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;
use Illuminate\Support\Facades\Auth;


class EntrepriseController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'company_name' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'address_complement' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'city' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'establishment_date' => 'nullable|date',
            'contact_name' => 'required|string|max:255',
            'contact_position' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:20',
            'opportunities' => 'nullable|array',
            'fields' => 'nullable|array',
            'inclusion_diversity' => 'nullable|array',
            'training_support' => 'nullable|array',
            'selected_offer' => 'nullable|string|max:255',
            
        ]);

        // Retrieve user ID from session
        $user_id = session('user_id');

        // Create the entreprise record
        Entreprise::create([
            'id' =>  Auth::id(),
            'user_id' => Auth::id(),
            'nom_entreprise' => $request->company_name,
            'secteur_activite' => $request->industry,
            'adresse' => $request->address,
            'complement_adresse' => $request->address_complement,
            'code_postal' => $request->postal_code,
            'ville' => $request->city,
            'region' => $request->region,
            'pays' => $request->country,
            'site_web' => $request->website,
            'date_creation' => $request->establishment_date,
            'nom_contact' => $request->contact_name,
            'fonction_contact' => $request->contact_position,
            'email_contact' => $request->contact_email,
            'telephone_contact' => $request->contact_phone,
            'opportunities' => json_encode($request->opportunities),
            'fields' => json_encode($request->fields),
            'inclusion_diversity' => json_encode($request->inclusion_diversity),
            'training_support' => json_encode($request->training_support),
            'selected_offer' => $request->selected_offer,
        ]);

        // Redirect to a success page or any other appropriate route
        return redirect()->route('entreprise.success')->with('status', 'Entreprise created successfully!');
    }
}
