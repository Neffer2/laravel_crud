<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\PanelPrincipalController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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
Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/', [PanelPrincipalController::class, 'index'])->name('main_panel');
   
Route::resource('medicos', MedicosController::class);
Route::resource('pacientes', PacientesController::class);
Route::resource('citas', CitasController::class);
