<?php


use App\Http\Controllers\OffreController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:etudiant'])->prefix('etudiants')->group(function () {
    Route::get('/dashboard', function () {
        return view('etudiant.tableau-de-bord');
    })->name('etudiant.dashboard');
    Route::get('/explorer-event', function () {
        return view('etudiant.evenements');
    })->name('explorer-event');
    Route::get('/motdepasse', function () {
        return view('etudiant.motdepasse');
    })->name('motdepasse');
    Route::get('/postuler', function () {
        return view('etudiant.postuler');
    })->name('postuler');
    Route::get('/candidature', function () {
        return view('etudiant.candidatures');
    })->name('candidature');

    route::get('/offres', [OffreController::class, 'index'])->name('offers.index');
    Route::get('/offres/{id}', [OffreController::class, 'show'])->name('offers.show');
    route::post('/offres/{id}/postuler', [OffreController::class, 'apply'])->name('offers.apply');
    Route::get('/explorer-offre', function () {
        return view('etudiant.explorer-offres');
    })->name('explorer-offre');

    Route::get('/offre', [OffreController::class, 'create'])->name('offre');
    Route::get('/profil', function () {
        return view('etudiant.portfolio');
    })->name('profil');
});
