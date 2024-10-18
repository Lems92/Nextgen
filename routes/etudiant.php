<?php


use App\Http\Controllers\EtudiantController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:etudiant'])->prefix('etudiants')->group(function () {

    Route::get('/dashboard', [EtudiantController::class, 'dashboard'])->name('etudiants.dashboard');
    Route::get('/explorer-event', [EtudiantController::class, 'explorer_event'])->name('etudiants.explorer_event');
    Route::get('/mot-de-passe', [EtudiantController::class, 'mot_de_passe'])->name('etudiants.mot_de_passe');
    Route::get('/postuler', [EtudiantController::class, 'postuler_offre'])->name('etudiants.postuler_offre');
    Route::get('/mes-candidature', [EtudiantController::class, 'mes_candidatures'])->name('etudiants.mes_candidatures');
    Route::get('/offres/{offre:slug}', [EtudiantController::class, 'show_offer'])->name('etudiants.offers.show');
    route::post('/offres/{offre:slug}/postuler', [EtudiantController::class, 'apply'])->name('etudiants.offers.apply');
    Route::get('/explorer-offre', [EtudiantController::class, 'explorer_offre'])->name('etudiants.explorer_offre');
    Route::post('/mes-candidatures/annuler', [EtudiantController::class, 'annuler_postulation'])->name('etudiant.postulation.annuler');
    Route::get('/universites', [EtudiantController::class, 'mon_universite'])->name('etudiant.mon_universite');
    Route::get('/demande-affiliation-universite', [EtudiantController::class, 'demander_affiliation_get'])->name('etudiant.demande_affiliation_univ_get');
    Route::post('/demande-affiliation-universite', [EtudiantController::class, 'demander_affiliation_post'])->name('etudiant.demande_affiliation_univ_post');

});

Route::middleware(['auth', 'verified', 'role:etudiant,admin,service-carriere,entreprise'])->group(function (){
    Route::get('/{etudiant:slug}/portfolio', [EtudiantController::class, 'portfolio'])->name('etudiants.portfolio'); //entreprise et universite peut aussi voir le protfloio
});

Route::middleware(['auth', 'verified', 'role:etudiant,service-carriere'])->group(function (){
    Route::post('/etudiant-et-universite/supprimer-affiliation', [EtudiantController::class, 'delete_affiliation'])->name('etu_univ.delete_affiliation');
});
