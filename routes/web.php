<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/appointments/create', [PatientController::class, 'create'])->name('appointment.create');
Route::post('/appointments', [PatientController::class, 'storePatient'])->name('appointment.storePatient');
Route::post('/appointments/{id}/start', [PatientController::class, 'start'])
    ->name('appointments.start');

Route::get('/queue-board', function () {
    return view('queue-board');
});
// Route::resource('patients', PatientController::class);

// Route::get('/appointments/patients', [PatientController::class, 'view']);
// Route::post('appointments', [PatientController::class, 'storepatient']);

// Route::get ('/appointments/create', [AppointmentController::class, 'create']);
// Route::post('appointments', [AppointmentController::class, 'storeAppointment']);

// Route::post('/appointments', [AppointmentController::class, 'store']);
// Route::get('/appointments/{date}', [AppointmentController::class, 'getByDate']);

// Route::post('/appointments', [AppointmentController::class, 'store']);
// Route::get('/appointments/{date}', [AppointmentController::class, 'byDate']);
// Route::post('/user', [Controller::class, 'store']);
