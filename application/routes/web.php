<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\LoginController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about-us', [AboutController::class, 'index'])->name('about.us');
Route::get('/', [HomeController::class, 'index']);
Route::get('/articles', [ArticlesController::class, 'show']);
Route::get('/contactus', [ContactusController::class, 'show'])->name('contactus.show');
<<<<<<< HEAD
Route::post('/contactus', [ContactusController::class, 'store'])->name('contactus.store');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
=======
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');

>>>>>>> 80f89e1e3b50ae8dcb0cd5c3dae92deea6d9e0d1
