<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EntrepriseController extends Controller
{
    public function dashboard(): View
    {
        return view('entreprise.tableau-de-bord');
    }

    public function offres(Request $request): View
    {
        $user = $request->user();
        $user->load('userable');
        $entreprise = $user->userable;
        $entreprise->load('offres');
        //$offres = Offre::where('entreprise_id', '=', $user->userable->id);
        //dd($user->userable->id, $offres);
        return view('entreprise.offres', [
            'offres' => $entreprise->offres
            //'offres' => $offres
        ]);
    }
}
