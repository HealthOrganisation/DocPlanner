<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/treatments', [AppointmentController::class, 'getTreatments']);
Route::get('/doctors', [AppointmentController::class, 'getDoctors']);
Route::get('/available-times', [AppointmentController::class, 'getAvailableTimes']);
Route::post('/book-appointment', [AppointmentController::class, 'bookAppointment']);
