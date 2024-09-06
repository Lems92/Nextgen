<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/', function () {return view('accueil');})->name('accueil');
Route::get('/test', function () {return view('test');});
Route::get('/about', function () {return view('about');})->name('about');
Route::get('/faq', function () {return view('faq');})->name('faq');
Route::get('/connexion', function () {return view('connexion');})->name('connexion');
//Inscription
Route::get('/inscription', function () {return view('inscription.inscription');})->name('inscription');
Route::post('/inscription', [RegistrationController::class, 'register'])->name('inscription');
Route::post('/inscription-etudiant', [RegistrationController::class, 'register'])->name('inscription-etu');
Route::get('/inscription-etudiant', function () {return view('inscription.form-etudiant');})->name('inscription-etu');
Route::post('/inscription-entreprise', [RegistrationController::class, 'register'])->name('form-entreprise');
Route::get('/inscription-entreprise', function () {return view('inscription.form-entreprise');})->name('form-entreprise');
Route::get('/inscritpion-service-carriere', function () {return view('service.carriere');})->name('service.carriere');
Route::get('/inscription-service-carriere', [RegistrationController::class, 'register'])->name('service.carriere');
// Tableau de bord
Route::get('/dashboard-entreprise', function () {return view('entreprise.tableau-de-bord');})->name('entreprise.tableau-de-bord');
Route::get('/dashboard-etudiant', function() {return view('etudiant.tableau-de-bord');})->name('etudiant.dashboard');
Route::get('/offre', function () {return view('entreprise.publier-une-offre');})->name('offre');
Route::get('/profil', function () {return view('etudiant.portfolio');})->name('profil');


require __DIR__.'/auth.php';
