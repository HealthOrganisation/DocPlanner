<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;

use App\Http\Controllers\HomeController;
use App\Models\Appointment;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('Pages.authentification.Login');
});
Route::get('/signup', function () {
    return view('Pages.authentification.Signup');
});
Route::get('/forgotpassword', function () {
    return view('Pages.authentification.ForgotPassword');
});
Route::get('/Doctor', function () {
    return view('Pages.DoctorProfile');
});

// Logout route
Route::post('/logout', function() {
    Auth::logout();
    return redirect('/');
})->name('logout');


Route::get('/', [HomeController::class, 'index'])->name('home'); 
Route::get('/about-us', [AboutController::class, 'index'])->name('about.us');
Route::get('/doctor', [DoctorController::class, 'doctor'])->name('doctor');
//////////////////////////////////////////////////
Route::get('/articles', [ArticlesController::class, 'show'])->name('articles');;
Route::get('/articles/{id}', [ArticlesController::class, 'find'])->name('show');
Route::get('/articles', [ArticlesController::class, 'showArticles']);

/////////////////////////////////////////
Route::get('/contactus', [ContactusController::class, 'show'])->name('contactus.show');

Route::post('/contactus', [ContactusController::class, 'store'])->name('contactus.store');

Route::post('/signup', [UserController::class, 'store'])->name('user.store');
Route::post('/login', [UserController::class, 'login'])->name('login');


Route::middleware('auth')->group(function () {
    Route::get('/DoctorProfile', [DoctorController::class, 'showProfile'])->name('doctor.profile');
});

Route::get('/appointment', function () {
    return view('appointments'); // Cette vue affichera le design
});

Route::get('/PatientProfile', function () {
    return view('PatientProfile'); // Cette vue affichera le design
});
