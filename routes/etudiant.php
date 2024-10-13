<?php


use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\OffreController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:etudiant'])->prefix('etudiants')->group(function () {

    Route::get('/dashboard', [EtudiantController::class, 'dashboard'])->name('etudiants.dashboard');
    Route::get('/explorer-event', [EtudiantController::class, 'explorer_event'])->name('etudiants.explorer_event');
    Route::get('/mot-de-passe', [EtudiantController::class, 'mot_de_passe'])->name('etudiants.mot_de_passe');
    Route::get('/postuler', [EtudiantController::class, 'postuler_offre'])->name('etudiants.postuler_offre');
    Route::get('/mes-candidature', [EtudiantController::class, 'mes_candidatures'])->name('etudiants.mes_candidatures');
    Route::get('/offres/{id}', [OffreController::class, 'show'])->name('offers.show');
    route::post('/offres/{id}/postuler', [OffreController::class, 'apply'])->name('offers.apply');
    Route::get('/explorer-offre', [EtudiantController::class, 'explorer_offre'])->name('etudiants.explorer_offre');
    Route::get('/portfolio', [EtudiantController::class, 'portfolio'])->name('etudiants.portfolio');
});
