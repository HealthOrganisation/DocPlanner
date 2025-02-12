<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\ReviewController;
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
//Route::get('/Doctor', function () {
//    return view('Pages.DoctorProfile');
//});



Route::middleware('auth')->group(function () {
    // The doctor profile route
    Route::get('/doctor/profile', [DoctorController::class, 'showProfile'])->name('doctor.profile');

    // Other doctor-related routes
    Route::put('/doctors/{doctor}', [DoctorController::class, 'update'])->name('doctors.update');
    Route::resource('availabilities', AvailabilityController::class);
    Route::resource('reviews', ReviewController::class);
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






//admin
Route::prefix('admin')->group(function () {
    // Admin Login Routes
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});
    // Protected Admin Routes
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/doctors', [AdminController::class, 'doctors'])->name('admin.doctors.index');
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users.index');
        Route::delete('/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
        Route::get('/patients', [AdminController::class, 'patients'])->name('admin.patients.index');
        Route::delete('/patients/{id}', [AdminController::class, 'destroyPatient'])->name('admin.patients.destroy');
        Route::get('/contactus', [AdminController::class, 'contactus'])->name('admin.contactus.index');
        Route::delete('/contactus/{id}', [AdminController::class, 'destroyContact'])->name('admin.contactus.destroy');
        Route::get('/admins', [AdminController::class, 'admins'])->name('admin.admins.index');
        Route::get('/admins/create', [AdminController::class, 'createAdminForm'])->name('admin.admins.create');
        Route::post('/admins', [AdminController::class, 'storeAdmin'])->name('admin.admins.store');
        Route::delete('/admins/{id}', [AdminController::class, 'destroyAdmin'])->name('admin.admins.destroy');
    });

