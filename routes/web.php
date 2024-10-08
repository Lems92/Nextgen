<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\EventController;

use App\Http\Controllers\UniversiteController;


route::get('/offres', [OffreController::class, 'index'])->name('offers.index');
Route::get('/offres/{id}', [OffreController::class, 'show'])->name('offers.show');
route::post('/offres/{id}/postuler', [OffreController::class, 'apply'])->name('offers.apply');
Route::get('/explorer-offre', function() {return view('etudiant.explorer-offres');})->name('explorer-offre');


Route::get('/events/create', [EventController::class, 'create'])->middleware('auth')->name('events.create');
Route::post('/events', [EventController::class, 'store'])->middleware('auth')->name('events.store');
Route::get('/events', [EventController::class, 'index'])->name('events.index');


Route::get('/services-carriere', [UniversiteController::class, 'create'])->name('universites.create');
Route::post('/services-carriere', [UniversiteController::class, 'store'])->name('universites.store');

// Afficher le formulaire
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

// Soumettre le formulaire
Route::post('/events/store', [EventController::class, 'store'])->name('events.store');

Route::middleware('auth')->group(function() {
    Route::get('/offres/create', [OffreController::class, 'create'])->name('offres.create');
    route::get('/offre', [OffreController::class, 'create'])->name('offre');

    // Route pour publier l'offre
    Route::post('/offres', [OffreController::class, 'store'])->name('offres.store');
});

Route::post('/connexion', [LoginController::class, 'login'])->name('login.submit');

Route::post('/enregistrer-entreprise', [EntrepriseController::class, 'store'])->name('entreprise.store');
Route::get('/entreprise-succes', function () {
    return view('entreprise.succes');
})->name('entreprise.success');

Route::get('/', function () {return view('accueil');})->name('accueil');
Route::get('/test', function () {return view('test');});
Route::get('/about', function () {return view('about');})->name('about');
Route::get('/faq', function () {return view('faq');})->name('faq');
Route::get('/connexion', function () {return view('connexion');})->name('connexion');

//Inscription
Route::get('/inscription', [RegistrationController::class, 'register_get'])->name('inscription');
Route::post('/inscription', [RegistrationController::class, 'register_post'])->name('inscription.post');
Route::get('/inscription-etudiant', [RegistrationController::class, 'register_etudiant_get'])->name('inscription.etudiant.get');
Route::post('/inscription-etudiant', [RegistrationController::class, 'register_etudiant_post'])->name('inscription.etudiant.post');
Route::get('/inscription-entreprise', [RegistrationController::class, 'register_entreprise_get'])->name('inscription.entreprise.get');
Route::post('/inscription-entreprise', [RegistrationController::class, 'register_entreprise_post'])->name('inscription.entreprise.post');
Route::get('/inscription-service-carriere', [RegistrationController::class, 'register_service_carriere_get'])->name('inscription.service-carriere.get');
Route::post('/inscription-service-carriere', [RegistrationController::class, 'register_service_carriere_post'])->name('inscription.service-carriere.post');
// Tableau de bord
Route::get('/dashboard-entreprise', function () {return view('entreprise.tableau-de-bord');})->name('entreprise.tableau-de-bord');
Route::get('/dashboard-etudiant', function() {return view('etudiant.tableau-de-bord');})->name('etudiant.dashboard');
Route::get('/dashboard-service', function() {return view('universite.tableau-de-bord');})->name('univ-dashboard');
route::get('/offre', [OffreController::class, 'create'])->name('offre');
Route::get('/profil', function () {return view('etudiant.portfolio');})->name('profil');
Route::get('/gerer-offre', function () {return view('entreprise.gerer-offre');})->name('gerer-offre');
Route::get('/gerer-candidat', function () {return view('entreprise.gerer-candidat');})->name('gerer-candidat');
Route::get('/gerer-event', function () {return view('universite.gerer-event');})->name('gerer-event');
Route::get('/gestion-etudiants', function () {return view('universite.gestion-etudiants');})->name('gestion-etudiants');
Route::get('/publier-event', function() {return view('universite.publier-evenements');})->name('publier-event');
Route::get('/postuler', function() {return view('etudiant.postuler');})->name('postuler');
Route::get('/candidature', function() {return view('etudiant.candidatures');})->name('candidature');

Route::get('/admin', function() {return view('admin.admin');})->name('admin');
Route::get('/modiferProfil', function() {return view('etudiant.modifierProfil');})->name('modifierProfil');
Route::get('/explorer-event', function() {return view('etudiant.evenements');})->name('explorer-event');
Route::get('/motdepasse', function() {return view('etudiant.motdepasse');})->name('motdepasse');

/*Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/

//require __DIR__.'/auth.php';
