<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\DiagnosiController;
use App\Http\Controllers\DrugPrescriptionController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\RedTestController;
use App\Http\Controllers\VisitController;
use App\Models\Visit;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//====================== User Routes [HomeController]
// Route::post('/appointment', [HomeController::class, 'createAppointment']);
// Route::get('/my_appointment', [HomeController::class, 'my_appointment']);
// Route::delete('/cancel_appoint/{id}', [HomeController::class, 'cancel_appoint']);

Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
Route::get('/patients/edit/{id}', [PatientController::class, 'edit'])->name('patients.edit');
Route::post('/patients/{id}', [PatientController::class, 'update'])->name('patients.update');
Route::delete('/patients/{id}', [PatientController::class, 'delete'])->name('patients.delete');
Route::get('/patients/search', [PatientController::class, 'search'])->name('patients.search');

Route::get('/appointments', [VisitController::class, 'show_appointments'])->name('appointments.index');
Route::get('/appointments/canceled/{id}', [VisitController::class, 'canceled'])->name('appointments.canceled');
Route::get('/appointments/approved/{id}', [VisitController::class, 'approved'])->name('appointments.approved');
Route::get('/appointments/search', [VisitController::class, 'search'])->name('appointments.search');
Route::post('/appointments', [VisitController::class, 'store'])->name('appointments.store');
Route::get('/appointments/create', [VisitController::class, 'create'])->name('appointments.create');


Route::get('/redtests', [RedTestController::class, 'index'])->name('redtests.index');
Route::get('/redtests/create', [RedTestController::class, 'create'])->name('redtests.create');
Route::post('/redtests', [RedTestController::class, 'store'])->name('redtests.store');
Route::get('/redtests/edit/{id}', [RedTestController::class, 'edit'])->name('redtests.edit');
Route::post('/redtests/{id}', [RedTestController::class, 'update'])->name('redtests.update');
Route::delete('/redtests/{id}', [RedTestController::class, 'delete'])->name('redtests.delete');
Route::get('/redtests/search', [RedTestController::class, 'search'])->name('redtests.search');

Route::get('/prescriptions', [DrugPrescriptionController::class, 'index'])->name('prescriptions.index');
Route::get('/prescriptions/create', [DrugPrescriptionController::class, 'create'])->name('prescriptions.create');
Route::post('/prescriptions', [DrugPrescriptionController::class, 'store'])->name('prescriptions.store');
Route::get('/prescriptions/edit/{id}', [DrugPrescriptionController::class, 'edit'])->name('prescriptions.edit');
Route::post('/prescriptions/{id}', [DrugPrescriptionController::class, 'update'])->name('prescriptions.update');
Route::delete('/prescriptions/{id}', [DrugPrescriptionController::class, 'delete'])->name('prescriptions.delete');
Route::get('/prescriptions/search', [DrugPrescriptionController::class, 'search'])->name('prescriptions.search');


Route::get('/diagnosis', [DiagnosiController::class, 'index'])->name('diagnosis.index');
Route::get('/diagnosis/create', [DiagnosiController::class, 'create'])->name('diagnosis.create');
Route::post('/diagnosis', [DiagnosiController::class, 'store'])->name('diagnosis.store');
Route::get('/diagnosis/edit/{id}', [DiagnosiController::class, 'edit'])->name('diagnosis.edit');
Route::post('/diagnosis/{id}', [DiagnosiController::class, 'update'])->name('diagnosis.update');
Route::delete('/diagnosis/{id}', [DiagnosiController::class, 'delete'])->name('diagnosis.delete');
Route::get('/diagnosis/search', [DiagnosiController::class, 'search'])->name('diagnosis.search');

Route::get('/procedures', [ProcedureController::class, 'index'])->name('procedures.index');
Route::get('/bill/{id}', [BillController::class, 'index'])->name('bill.show');
Route::delete('/bill/{id}', [BillController::class, 'delete'])->name('bill.delete');


//====================== Auth Routes
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');