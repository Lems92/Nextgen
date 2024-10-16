<?php

use App\Http\Controllers\EntrepriseController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:entreprise', 'user_state'])
    ->prefix('entreprises')
    ->group(function () {
        Route::get('/dashboard', [EntrepriseController::class, 'dashboard'])->name('entreprise.dashboard');

        //offre
        Route::middleware('subscription.permission:mise_en_ligne_offre')->group(function () {
            Route::get('/offres/publier', [EntrepriseController::class, 'publier_offre'])->name('entreprise.offres.create');
            Route::post('/offres/publier', [EntrepriseController::class, 'validate_publier_offre'])->name('entreprise.offres.store');
            Route::get('/offres', [EntrepriseController::class, 'offres'])->name('entreprise.offres');
            Route::get('/offres/{offre:slug}', [EntrepriseController::class, 'show_offre'])->name('entreprise.offres.show');
            Route::get('/offres/{offre:slug}/modifier', [EntrepriseController::class, 'edit_offre'])->name('entreprise.offres.edit');
            Route::post('/offres/{offre:slug}/modifier', [EntrepriseController::class, 'update_offre'])->name('entreprise.offres.update');
            Route::post('/offres/{offre:slug}/supprimer', [EntrepriseController::class, 'delete_offre'])->name('entreprise.offres.delete');
        });

        //candidature
        Route::middleware('subscription.permission:gestion_candidature')->group(function () {
            Route::get('/gerer-candidat', [EntrepriseController::class, 'gerer_candidat'])->name('entreprise.gerer-candidat');
        });

        // page entreprise
        Route::middleware('subscription.permission:page_presentation_entreprise')->group(function () {
            Route::get('/page-entreprise', [EntrepriseController::class, 'page_entreprise'])->name('entreprise.page_entreprise');
        });

        //page shortlist vip
        Route::middleware('subscription.permission:shortlist_vip')->group(function () {
            Route::get('/shortlist-vip', [EntrepriseController::class, 'shortlist_vip'])->name('entreprise.shortlist_vip');
        });

        //abonnement
        Route::get('/mon-abonnement', [EntrepriseController::class, 'mon_abonnement'])->name('entreprise.mon_abonnement');
    });


// Page entreprise visible par tous
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/{entreprise:slug}/page-entreprise', [EntrepriseController::class, 'public_show_entreprise'])->name('public.show_entreprise');
});
