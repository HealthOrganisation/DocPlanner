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
Route::get('/about-us', [AboutController::class, 'index'])->name('about.us');
////////////////////
Route::get('/doctors', [DoctorController::class, 'doctor'])->name('doctors');
Route::get('/doctors/{id}', [DoctorController::class, 'showw'])->name('doctors.showw');
///////////////////////////////
Route::post('/logout', function() {
    Auth::logout();
    return redirect('/');
})->name('logout');



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [AboutController::class, 'index'])->name('about.us');
Route::get('/doctor', [DoctorController::class, 'doctor'])->name('doctor');
//////////////////////////////////////////////////
Route::get('/articles', [ArticlesController::class, 'show'])->name('articles');;
// Route for articles

Route::get('/articles/{id}', [ArticlesController::class, 'find'])->name('show');
Route::get('/articles', [ArticlesController::class, 'showArticles'])->name('articles.show');

// Contact Us routes
Route::get('/contactus', [ContactusController::class, 'show'])->name('contactus.show');
Route::post('/contactus', [ContactusController::class, 'store'])->name('contactus.store');


Route::middleware('auth')->group(function () {
    // The doctor profile route
    Route::get('/doctor/profile', [DoctorController::class, 'showProfile'])->name('doctor.profile');

    // Other doctor-related routes
    Route::put('/doctor/profile/update', [DoctorController::class, 'update'])->name('doctors.update');
    Route::resource('availabilities', AvailabilityController::class);
    Route::delete('/availabilities/delete', [AvailabilityController::class, 'destroy'])->name('availabilities.destroy');
    Route::resource('reviews', ReviewController::class);
});

// Routes for patient profile and edit
Route::middleware('auth')->group(function () {
    Route::get('patient/profile', [PatientController::class, 'showProfile'])->name('patients.profile');
    Route::get('patient/profile/edit', [PatientController::class, 'editProfile'])->name('patients.editProfile');
    Route::put('/patient/profile/update', [PatientController::class, 'updateProfile'])->name('patients.updateProfile');
    
    Route::get('/appointment', function () {
        return view('appointments'); // Cette vue affichera le design
    });
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


Route::middleware('auth')->group(function () {
    Route::get('/editprofilepatient', [PatientController::class, 'showProfile'])->name('patient.profile');
});

Route::get('/tablBord', function () {
    return view('tablBord'); // Cette vue affichera le design
});

Route::get('/PatientProfile', function () {
    return view('PatientProfile'); // Cette vue affichera le design
});

Route::post('/PatientProfile', [PatientController::class, 'store'])->name('patient.store');

Route::put('/editprofilepatient', [PatientController::class, 'update'])->name('patient.update');

Route::get('/editprofilepatient/{id_patient}', [PatientController::class, 'edit'])->name('editprofilepatient');

Route::get('/editprofilepatient/{id}', [PatientController::class, 'show'])->name('patient.show');

Route::get('/PatientProfile', [PatientController::class, 'create'])->name('patient.create');

Route::get('/editprofilepatient/{id}', [PatientController::class, 'edit'])->name('editprofilepatient');
Route::get('/patients/{id}', [PatientController::class, 'showw'])->name('patients.showw');


Route::get('/myappointment', [AppointmentController::class, 'index'])->name('appointments.index');
Route::get('/appointments', [AppointmentController::class, 'index2'])->name('appointments.index2');

Route::get('/myappointment/{id}', [AppointmentController::class, 'show']);

Route::get('/appointments/{id_doctor}', [AppointmentController::class, 'showByDoctor'])
    ->name('appointments.byDoctor');

/*
// Add the route for login redirection based on user roles
// Route::middleware('auth')->get('/home', function () {
//     $user = Auth::user();

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
*/
// You can also add other protected routes that might be role-specific here.
