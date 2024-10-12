<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:service-carriere', 'user_state'])
    ->prefix('service-carriere')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('universite.tableau-de-bord');
        })->name('service_carriere.dashboard');
        Route::get('/gerer-event', function () {
            return view('universite.gerer-event');
        })->name('gerer-event');
        Route::get('/gestion-etudiants', function () {
            return view('universite.gestion-etudiants');
        })->name('gestion-etudiants');
        Route::get('/publier-event', function () {
            return view('universite.publier-evenements');
        })->name('publier-event');
        Route::get('/events/create', [EventController::class, 'create'])->middleware('auth')->name('events.create');
        Route::post('/events', [EventController::class, 'store'])->middleware('auth')->name('events.store');
        Route::get('/events', [EventController::class, 'index'])->name('events.index');

        // Afficher le formulaire
        Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

        // Soumettre le formulaire
        Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
    });
