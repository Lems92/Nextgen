<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WaitingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\EventController;

Route::get('/', [HomeController::class, 'home'])->name('accueil');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');

Route::middleware(['guest'])->group(function () {

    // Authentification
    Route::get('/connexion', [LoginController::class, 'connexion'])->name('connexion');
    Route::post('/connexion', [LoginController::class, 'login'])->name('login.submit');
    //Inscription
    Route::get('/inscription', [RegistrationController::class, 'register_get'])->name('inscription');
    Route::post('/inscription', [RegistrationController::class, 'register_post'])->name('inscription.post');
    Route::get('/inscription-etudiant', [RegistrationController::class, 'register_etudiant_get'])->name('inscription.etudiant.get');
    Route::post('/inscription-etudiant', [RegistrationController::class, 'register_etudiant_post'])->name('inscription.etudiant.post');
    Route::get('/inscription-entreprise', [RegistrationController::class, 'register_entreprise_get'])->name('inscription.entreprise.get');
    Route::post('/inscription-entreprise', [RegistrationController::class, 'register_entreprise_post'])->name('inscription.entreprise.post');
    Route::get('/inscription-service-carriere', [RegistrationController::class, 'register_service_carriere_get'])->name('inscription.service-carriere.get');
    Route::post('/inscription-service-carriere', [RegistrationController::class, 'register_service_carriere_post'])->name('inscription.service-carriere.post');

});

//auth not verified
Route::middleware(['auth'])->group(function () {
    Route::get('/attente-verification-email', [WaitingController::class, 'waiting_email'])->name('attente_verification_email');
    Route::post('/deconnexion', [LoginController::class, 'logout'])->name('logout');
});

//commun
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/attente-verification-admin', [WaitingController::class, 'waiting_admin'])->name('attente_verification_admin');
    Route::get('/modiferProfil', function() {return view('etudiant.modifierProfil');})->name('modifierProfil');
});

// administration
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/entreprises', [AdminController::class, 'list_entreprises'])->name('admin.list_entreprises');
    Route::get('/admin/entreprises/{entreprise:slug}', [AdminController::class, 'show_entreprise'])->name('admin.show_entreprise');
    Route::get('/admin/universites', [AdminController::class, 'list_universites'])->name('admin.list_universites');
    Route::get('/admin/universites/{universite:slug}', [AdminController::class, 'show_universite'])->name('admin.show_universite');
    Route::post('/admin/activate-account', [AdminController::class, 'activate_account'])->name('admin.activate_account');
});

// etudiant
Route::middleware(['auth', 'verified', 'role:etudiant', 'user_state'])->group(function () {
    Route::get('/dashboard-etudiant', function() {return view('etudiant.tableau-de-bord');})->name('etudiant.dashboard');
    Route::get('/explorer-event', function() {return view('etudiant.evenements');})->name('explorer-event');
    Route::get('/motdepasse', function() {return view('etudiant.motdepasse');})->name('motdepasse');
    Route::get('/postuler', function() {return view('etudiant.postuler');})->name('postuler');
    Route::get('/candidature', function() {return view('etudiant.candidatures');})->name('candidature');

    route::get('/offres', [OffreController::class, 'index'])->name('offers.index');
    Route::get('/offres/{id}', [OffreController::class, 'show'])->name('offers.show');
    route::post('/offres/{id}/postuler', [OffreController::class, 'apply'])->name('offers.apply');
    Route::get('/explorer-offre', function() {return view('etudiant.explorer-offres');})->name('explorer-offre');

    Route::get('/offre', [OffreController::class, 'create'])->name('offre');
    Route::get('/profil', function () {return view('etudiant.portfolio');})->name('profil');
});

// entreprise
Route::middleware(['auth', 'verified', 'role:entreprise', 'user_state'])->group(function () {
    Route::get('/dashboard-entreprise', function () {return view('entreprise.tableau-de-bord');})->name('entreprise.dashboard');

    Route::get('/offres/create', [OffreController::class, 'create'])->name('offres.create');
    route::get('/offre', [OffreController::class, 'create'])->name('offre');

    // Route pour publier l'offre
    Route::post('/offres', [OffreController::class, 'store'])->name('offres.store');
    Route::get('/gerer-offre', function () {return view('entreprise.gerer-offre');})->name('gerer-offre');
    Route::get('/gerer-candidat', function () {return view('entreprise.gerer-candidat');})->name('gerer-candidat');
});

// service-carriere
Route::middleware(['auth', 'verified', 'role:service-carriere', 'user_state'])->group(function () {
    Route::get('/dashboard-service', function() {return view('universite.tableau-de-bord');})->name('service_carriere.dashboard');
    Route::get('/gerer-event', function () {return view('universite.gerer-event');})->name('gerer-event');
    Route::get('/gestion-etudiants', function () {return view('universite.gestion-etudiants');})->name('gestion-etudiants');
    Route::get('/publier-event', function() {return view('universite.publier-evenements');})->name('publier-event');
    Route::get('/events/create', [EventController::class, 'create'])->middleware('auth')->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->middleware('auth')->name('events.store');
    Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Afficher le formulaire
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

// Soumettre le formulaire
    Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
});


//email verification
Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
});
