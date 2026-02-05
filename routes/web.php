<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

// Route::get('/patients/create', [PatientController::class, 'create']);
// Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');

// Route::get('/appointments/create/{patient}', [AppointmentController::class, 'create'])
//     ->name('appointments.create');

// Route::post('/appointments', [AppointmentController::class, 'store'])
//     ->name('appointments.store');


Route::get('/patients/register', [PatientController::class, 'create'])->name('patients.create');
Route::post('/patients/register', [PatientController::class, 'store'])->name('patients.store');


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::post('/appointments', [AppointmentController::class, 'store']);
// Route::get('/appointments/{date}', [AppointmentController::class, 'getByDate']);

// Route::post('/appointments', [AppointmentController::class, 'store']);
// Route::get('/appointments/{date}', [AppointmentController::class, 'byDate']);
// Route::post('/user', [Controller::class, 'store']);
