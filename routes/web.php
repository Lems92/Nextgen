<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;


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
Route::get('/inscription-service-carriere', function () {return view('inscription.form-service-carriere');})->name('service.carriere');
Route::post('/inscription-service-carriere', [RegistrationController::class, 'register'])->name('service.carriere');
// Tableau de bord
Route::get('/dashboard-entreprise', function () {return view('entreprise.tableau-de-bord');})->name('entreprise.tableau-de-bord');
Route::get('/dashboard-etudiant', function() {return view('etudiant.tableau-de-bord');})->name('etudiant.dashboard');
Route::get('/dashboard-service', function() {return view('universite.tableau-de-bord');})->name('univ-dashboard');
Route::get('/offre', function () {return view('entreprise.publier-une-offre');})->name('offre');
Route::get('/profil', function () {return view('etudiant.portfolio');})->name('profil');
Route::get('/gerer-offre', function () {return view('entreprise.gerer-offre');})->name('gerer-offre');
Route::get('/gerer-candidat', function () {return view('entreprise.gerer-candidat');})->name('gerer-candidat');
Route::get('/gerer-event', function () {return view('universite.gerer-event');})->name('gerer-event');
Route::get('/gestion-etudiants', function () {return view('universite.gestion-etudiants');})->name('gestion-etudiants');
Route::get('/publier-event', function() {return view('universite.publier-evenements');})->name('publier-event');
Route::get('/postuler', function() {return view('etudiant.postuler');})->name('postuler');
Route::get('/candidature', function() {return view('etudiant.candidatures');})->name('candidature');
Route::get('/explorer-offre', function() {return view('etudiant.explorer-offres');})->name('explorer-offre');
Route::get('/admin', function() {return view('admin.admin');})->name('admin');
Route::get('/modiferProfil', function() {return view('etudiant.modifierProfil');})->name('modifierProfil');



