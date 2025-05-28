<?php

use Illuminate\Support\Facades\Route;
use Modules\PkgGestionInscription\Controllers\AtelierController;
use Modules\PkgGestionInscription\Controllers\InscriptionController;

Route::get('/dashboard2', [InscriptionController::class, 'index']);
Route::get('/table', [InscriptionController::class, 'Table']);

Route::resource('ateliers', AtelierController::class);

