<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about-us', [AboutController::class, 'index'])->name('about.us');
