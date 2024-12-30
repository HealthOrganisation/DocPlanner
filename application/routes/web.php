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
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');

