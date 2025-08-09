<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Hospital\AppointmentController;
use App\Http\Controllers\Hospital\BedController;
use App\Http\Controllers\Hospital\BillingController;
use App\Http\Controllers\Hospital\DepartmentController;
use App\Http\Controllers\Hospital\DoctorController;
use App\Http\Controllers\Hospital\EyeReportController;
use App\Http\Controllers\Hospital\LabReportController;
use App\Http\Controllers\Hospital\MedicalRecordController;
use App\Http\Controllers\Hospital\PatientController;
use App\Http\Controllers\Hospital\PrescriptionController;
use App\Http\Controllers\Hospital\UserController;
use App\Http\Controllers\Hospital\WardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/eye-reports', [EyeReportController::class, 'create'])->name('eye-reports.create');
    Route::post('/eye-reports', [EyeReportController::class, 'store'])->name('eye-reports.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/help', [DashboardController::class, 'help'])->name('help');
    Route::get('/patients', [PatientController::class, 'index'])->name('patients');
    Route::get('/create-patients', [PatientController::class, 'create'])->name('patients.create');
    Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
    Route::get('/lab-reports', [LabReportController::class, 'index'])->name('lab.report.index');

    Route::get('/departments', [\App\Http\Controllers\Hospital\DepartmentController::class, 'index'])->name('departments');
    Route::get('/departments-create', [\App\Http\Controllers\Hospital\DepartmentController::class, 'create'])->name('departments-create');
    Route::post('/departments', [\App\Http\Controllers\Hospital\DepartmentController::class, 'store'])->name('departments.store');
    Route::get('/departments/{id}/edit', [\App\Http\Controllers\Hospital\DepartmentController::class, 'edit'])->name('departments.edit');
    Route::put('/departments/{id}', [\App\Http\Controllers\Hospital\DepartmentController::class, 'update'])->name('departments.update');
    Route::delete('/departments/{id}', [\App\Http\Controllers\Hospital\DepartmentController::class, 'destroy'])->name('departments.destroy');
});


//Route::prefix('hospital')->group(function () {
//
//    Route::resource('users', UserController::class);
//    Route::resource('departments', DepartmentController::class);
//    Route::resource('doctors', DoctorController::class);
//    Route::resource('patients', PatientController::class);
//    Route::resource('appointments', AppointmentController::class);
//    Route::resource('medical-records', MedicalRecordController::class);
//    Route::resource('prescriptions', PrescriptionController::class);
//    Route::resource('wards', WardController::class);
//    Route::resource('beds', BedController::class);
//    Route::resource('billings', BillingController::class);
//    Route::resource('lab-reports', LabReportController::class);
//
//});

require __DIR__.'/auth.php';
