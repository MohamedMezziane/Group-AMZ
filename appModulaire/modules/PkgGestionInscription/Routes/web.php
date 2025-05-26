<?php

use Illuminate\Support\Facades\Route;
use Modules\PkgGestionInscription\Controllers\InscriptionController;

Route::get('/dashboard2', [InscriptionController::class, 'index']);