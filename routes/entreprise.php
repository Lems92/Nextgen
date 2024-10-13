<?php

use App\Http\Controllers\EntrepriseController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:entreprise', 'user_state'])
    ->prefix('entreprises')
    ->group(function () {
        Route::get('/dashboard', [EntrepriseController::class, 'dashboard'])->name('entreprise.dashboard');

        //offre
        Route::get('/offres/publier', [EntrepriseController::class, 'publier_offre'])->name('entreprise.offres.create');
        Route::post('/offres/publier', [EntrepriseController::class, 'validate_publier_offre'])->name('entreprise.offres.store');
        Route::get('/offres', [EntrepriseController::class, 'offres'])->name('entreprise.offres');
        Route::get('/offres/{offre:slug}', [EntrepriseController::class, 'show_offre'])->name('entreprise.offres.show');
        Route::get('/offres/{offre:slug}/modifier', [EntrepriseController::class, 'edit_offre'])->name('entreprise.offres.edit');
        Route::post('/offres/{offre:slug}/modifier', [EntrepriseController::class, 'update_offre'])->name('entreprise.offres.update');
        Route::post('/offres/{offre:slug}/supprimer', [EntrepriseController::class, 'delete_offre'])->name('entreprise.offres.delete');
        //candidature
        Route::get('/gerer-candidat', function () {
            return view('entreprise.gerer-candidat');
        })->name('entreprise.gerer-candidat');
    });
