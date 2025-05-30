<?php

use Illuminate\Support\Facades\Route;
use Modules\PkgGestionInscription\Controllers\AtelierController;
use Modules\PkgGestionInscription\Controllers\InscriptionController;
use Modules\PkgGestionInscription\Controllers\GroupeController;

Route::get('/dashboard2', [InscriptionController::class, 'index']);
Route::get('/table', [InscriptionController::class, 'Table']);

Route::resource('ateliers', AtelierController::class);
Route::resource('groupes', GroupeController::class);

