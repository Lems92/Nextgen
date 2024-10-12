<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:admin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/entreprises', [AdminController::class, 'list_entreprises'])->name('admin.list_entreprises');
        Route::get('/entreprises/{entreprise:slug}', [AdminController::class, 'show_entreprise'])->name('admin.show_entreprise');
        Route::get('/universites', [AdminController::class, 'list_universites'])->name('admin.list_universites');
        Route::get('/universites/{universite:slug}', [AdminController::class, 'show_universite'])->name('admin.show_universite');
        Route::post('/activate-account', [AdminController::class, 'activate_account'])->name('admin.activate_account');
        Route::get('/parametrages', [AdminController::class, 'parametrages'])->name('admin.parametrages');
        Route::get('/parametrages/create', [AdminController::class, 'create_parametrage'])->name('admin.parametrages.create');
        Route::post('/parametrages/create', [AdminController::class, 'store_parametrage'])->name('admin.parametrages.store');
        Route::post('/parametrages/delete', [AdminController::class, 'delete_parametrage'])->name('admin.parametrages.delete');
        Route::get('/parametrages/{id}/update', [AdminController::class, 'update_parametrage'])->name('admin.parametrages.update');
        Route::post('/parametrages/{id}/update', [AdminController::class, 'validate_update_parametrage'])->name('admin.parametrages.validate_update');
        //domaines etudes
        Route::get('/domaines_etudes', [AdminController::class, 'domaines_etudes'])->name('admin.domaines_etudes');
        Route::get('/domaines_etudes/create', [AdminController::class, 'create_domaine_etude'])->name('admin.domaines_etudes.create');
        Route::post('/domaines_etudes/create', [AdminController::class, 'store_domaine_etude'])->name('admin.domaines_etudes.store');
        Route::post('/domaines_etudes/delete', [AdminController::class, 'delete_domaine_etude'])->name('admin.domaines_etudes.delete');
        Route::get('/domaines_etudes/{domaine_etude:slug}/update', [AdminController::class, 'update_domaine_etude'])->name('admin.domaines_etudes.update');
        Route::post('/domaines_etudes/{domaine_etude:slug}/update', [AdminController::class, 'validate_update_domaine_etude'])->name('admin.domaines_etudes.validate_update');
    });

