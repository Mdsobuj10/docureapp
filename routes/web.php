<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Auth\PatientRegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontendController::class, 'index']) -> name('home.page');
Route::get('/login', [FrontendController::class, 'login']) -> name('login.page') -> middleware('admin.redirect');



//patient all route
Route::get('/patient/register', [FrontendController::class, 'PatientRegister']) -> name('patient.register.page') -> middleware('admin.redirect');
Route::get('/patient/deshboard', [FrontendController::class, 'PatientDeshboard']) -> name('patient.deshboard.page') -> middleware('patient');



//doctore all route
Route::get('/doctor/register', [FrontendController::class, 'DoctorRegister']) -> name('doctor.register.page');
Route::get('/doctor/deshboard', [FrontendController::class, 'DoctorDeshboard']) -> name('doctor.deshboard.page');


// authintication all route
Route::post('/patient-register', [PatientRegisterController::class, 'Register']) -> name('patient.register');
Route::post('/patient-login', [PatientRegisterController::class, 'PatientLogin']) -> name('patient.login');
Route::get('/patient-logout', [PatientRegisterController::class, 'PatientLogout']) -> name('patient.logout');