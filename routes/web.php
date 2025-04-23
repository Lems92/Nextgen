<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WaitingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubscriptionController;

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
    Route::post('/etudiants/modifer-profile', [EtudiantController::class, 'updateProfile'])->name('etudiants.update_profile');
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

//test route
Route::get('/show-offer', function () {return view('etudiant.show-offer');})->name('etudiants.show-offer');
Route::get('/page-entreprise', function () {return view('entreprise.page-entreprise');})->name('entreprise.page-entreprise');
Route::get('/vip', function () {return view('entreprise.shortlist-vip');})->name('entreprise.shortlist-vip');
//Route::get('/etu-univ', function () {return view('etudiant.etu-univ');})->name('etudiant.etu-univ');

Route::post('/candidats/approve/{id}', [EntrepriseController::class, 'approveCandidat'])->name('candidats.approve');
Route::get('/candidats/{id}/approve-page', [EntrepriseController::class, 'showApprovePage'])->name('candidats.approvePage');
Route::post('/candidats/reject/{id}', [EntrepriseController::class, 'rejectCandidat'])->name('candidats.reject');
Route::get('/candidats/{id}/reject-page', [EntrepriseController::class, 'showRejectPage'])->name('candidats.rejectPage');
Route::post('/candidats/reject-with-email', [EntrepriseController::class, 'rejectWithEmail'])->name('candidats.rejectWithEmail');
Route::post('/admin/delete-entreprise', [AdminController::class, 'deleteEntreprise'])->name('admin.delete_entreprise');
Route::delete('/admin/etudiant/{etudiant}', [EtudiantController::class, 'destroy'])->name('admin.delete_etudiant');
Route::delete('/admin/subscriptions/remove/{user}', [SubscriptionController::class, 'remove'])->name('admin.subscriptions.remove');
Route::post('/entreprise/reject-candidat/{etudiantId}', [EntrepriseController::class, 'rejectCandidat'])->name('entreprise.reject-candidat');
Route::post('/candidats/recruit/{id}', [EntrepriseController::class, 'recruitCandidat'])->name('candidats.recruit');
Route::post('/candidats/{id}/pending', [EntrepriseController::class, 'setPending'])->name('candidats.pending');
Route::post('/candidats/approve-with-email', [EntrepriseController::class, 'approveWithEmail'])->name('candidats.approveWithEmail');
Route::post('/candidats/approveWithEmail', [EntrepriseController::class, 'approveWithEmail'])->name('candidats.approveWithEmail');
Route::get('/candidats/{id}/recruit-page', [EntrepriseController::class, 'showRecruitPage'])->name('candidats.recruitPage');
Route::post('/candidats/recruit-with-email', [EntrepriseController::class, 'recruitWithEmail'])->name('candidats.recruitWithEmail');
Route::get('/entreprise/recruit/{id}', [EntrepriseController::class, 'showRecruitPage'])->name('entreprise.recruit');
