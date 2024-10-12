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
        Route::get('/etudiants', [AdminController::class, 'list_etudiants'])->name('admin.list_etudiants');
        Route::get('/etudiants/{etudiant:slug}', [AdminController::class, 'show_etudiant'])->name('admin.show_etudiant');
        //parametrages
        Route::get('/parametrages', [AdminController::class, 'parametrages'])->name('admin.parametrages');
        Route::get('/parametrages/create', [AdminController::class, 'create_parametrage'])->name('admin.parametrages.create');
        Route::post('/parametrages/create', [AdminController::class, 'store_parametrage'])->name('admin.parametrages.store');
        Route::post('/parametrages/delete', [AdminController::class, 'delete_parametrage'])->name('admin.parametrages.delete');
        Route::get('/parametrages/{id}/update', [AdminController::class, 'update_parametrage'])->name('admin.parametrages.update');
        Route::post('/parametrages/{id}/update', [AdminController::class, 'validate_update_parametrage'])->name('admin.parametrages.validate_update');
        //domaines etudes
        Route::get('/list-avec-categories', [AdminController::class, 'list_categories'])->name('admin.list_categories');
        Route::get('/list-avec-categories/create', [AdminController::class, 'create_list_categories'])->name('admin.list_categories.create');
        Route::post('/list-avec-categories/create', [AdminController::class, 'store_list_categories'])->name('admin.list_categories.store');
        Route::post('/list-avec-categories/delete', [AdminController::class, 'delete_list_categories'])->name('admin.list_categories.delete');
        Route::get('/list-avec-categories/{list_with_categorie:slug}/update', [AdminController::class, 'update_list_categories'])->name('admin.list_categories.update');
        Route::post('/list-avec-categories/{list_with_categorie:slug}/update', [AdminController::class, 'validate_update_list_categories'])->name('admin.list_categories.validate_update');
    });

