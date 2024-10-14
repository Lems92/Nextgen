<?php

use App\Http\Controllers\UniversiteController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:service-carriere', 'user_state'])
    ->prefix('service-carriere')
    ->group(function () {
        Route::get('/dashboard', [UniversiteController::class, 'dashboard'])->name('universite.dashboard');
        Route::get('/gerer-event', [UniversiteController::class, 'gerer_event'])->name('universite.gerer_event');
        Route::get('/gestion-etudiants', [UniversiteController::class, 'gerer_etudiants'])->name('universite.gestion_etudiants');
        Route::get('/publier-event', [UniversiteController::class, 'publier_event'])->name('universite.publier_event.create');
        Route::post('/publier-event', [UniversiteController::class, 'publier_event_store'])->name('universite.publier_event.store');
    });
