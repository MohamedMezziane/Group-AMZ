<?php

use Illuminate\Support\Facades\Route;
use Modules\PkgTableauDaffichage\Controllers\PostCategoryController;
use Modules\PkgTableauDaffichage\Controllers\PostController;

Route::get('/dashboard', [PostController::class, 'dashboard'])->name('dashboard');

Route::resource('posts', PostController::class);

Route::resource('/categories', PostCategoryController::class);