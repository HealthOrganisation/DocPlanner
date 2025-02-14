<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;

Route::get('/', [HomeController::class, 'index'])->name('home');  // Home Route

// Authentication routes (Login, Signup, etc.)
Route::get('/login', function () {
    return view('Pages.authentification.Login');
})->name('login');

Route::get('/signup', function () {
    return view('Pages.authentification.Signup');
})->name('signup');

Route::get('/forgotpassword', function () {
    return view('Pages.authentification.ForgotPassword');
})->name('forgotpassword');

Route::post('/login', [UserController::class, 'login'])->name('login.store');
Route::post('/signup', [UserController::class, 'store'])->name('user.store');
Route::post('/logout', function() {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Route for articles
Route::get('/articles', [ArticlesController::class, 'show'])->name('articles');
Route::get('/articles/{id}', [ArticlesController::class, 'find'])->name('show');
Route::get('/articles', [ArticlesController::class, 'showArticles'])->name('articles.show');

// Contact Us routes
Route::get('/contactus', [ContactusController::class, 'show'])->name('contactus.show');
Route::post('/contactus', [ContactusController::class, 'store'])->name('contactus.store');

// Route to view Doctor profile
Route::middleware('auth')->group(function () {
    Route::get('/doctor/profile', [DoctorController::class, 'showProfile'])->name('doctor.profile');
    Route::resource('availabilities', AvailabilityController::class);
    Route::resource('reviews', ReviewController::class);
 Route::put('/doctor/profile/update', [DoctorController::class, 'update'])->name('doctor.updateProfile');
});

// Routes for patient profile and edit
Route::middleware('auth')->group(function () {
    Route::get('patient/profile', [PatientController::class, 'showProfile'])->name('patients.profile');
    Route::get('patient/profile/edit', [PatientController::class, 'editProfile'])->name('patients.editProfile');
    Route::put('/patient/profile/update', [PatientController::class, 'updateProfile'])->name('patients.updateProfile');

});

// Admin routes (Admin Dashboard, User Management, etc.)
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.store');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

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
});

// Add the route for login redirection based on user roles
Route::middleware('auth')->get('/home', function () {
    $user = Auth::user();

    if ($user->hasRole('doctor')) {
        return redirect()->route('doctor.profile');  // Redirect to doctor profile if role is doctor
    } elseif ($user->hasRole('patient')) {
        return redirect()->route('patients.profile');  // Redirect to patient profile if role is patient
    } elseif ($user->hasRole('admin')) {
        return redirect()->route('admin.dashboard');  // Redirect to admin dashboard if role is admin
    } else {
        return redirect()->route('home');  // Default to home if no specific role
    }
})->name('home.redirect');

// You can also add other protected routes that might be role-specific here.
