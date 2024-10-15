<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WaitingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Auth\LoginController;

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
    Route::get('/etudiants/modifer-profile', function () {
        return view('etudiant.modifierProfil');
    })->middleware('role:etudiant')->name('etudiants.edit_profile');
});

//commun
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/attente-verification-admin', [WaitingController::class, 'waiting_admin'])->name('attente_verification_admin');
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

require __DIR__.'/administration.php';
require __DIR__.'/etudiant.php';
require __DIR__.'/entreprise.php';
require __DIR__.'/universite.php';

Route::get('/show-offer', function () {return view('etudiant.show-offer');})->name('etudiants.show-offer');
Route::get('/page-entreprise', function () {return view('entreprise.page-entreprise');})->name('entreprise.page-entreprise');
Route::get('/vip', function () {return view('entreprise.shortlist-vip');})->name('entreprise.shortlist-vip');