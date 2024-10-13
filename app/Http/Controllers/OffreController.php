<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Application;
use Illuminate\View\View;

class OffreController extends Controller
{
    public function show($id) : View | RedirectResponse
    {
        $offre = Offre::find($id);

        if (!$offre) {
            return redirect()->route('offers.index')->with('error', 'Offer not found');
        }

        return view('offers.show', compact('offre'));
    }

    public function apply($id)
    {
        $offre = Offre::find($id);

        if (!$offre) {
            return redirect()->route('offers.index')->with('error', 'Offer not found');
        }

        // Check if the user has already applied for this offer
        if (Application::where('user_id', Auth::id())->where('offre_id', $id)->exists()) {
            return redirect()->back()->with('error', 'You have already applied for this job');
        }

        // Create a new application record
        Application::create([
            'user_id' => Auth::id(),
            'offre_id' => $id,
        ]);

        return redirect()->route('offers.index')->with('success', 'Application submitted successfully');
    }

}
