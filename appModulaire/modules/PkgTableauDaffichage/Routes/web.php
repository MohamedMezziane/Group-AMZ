<?php

use Illuminate\Support\Facades\Route;

use Modules\PkgTableauDaffichage\Controllers\PostController;

Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
Route::get('/posts', [PostController::class, 'postsTable'])->name('posts');