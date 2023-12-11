<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuratkController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\SuratmController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DisposisiController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');

Route::middleware('auth')->group(function(){
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/', [DashboardController::class, 'index'])->name('landing');


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //surat masuk
    Route::get('/suratm', [SuratmController::class, 'index'])->name('suratm.index');
    Route::get('/suratm/create', [SuratmController::class, 'create'])->name('suratm.create');
    Route::post('/suratm', [SuratmController::class, 'store'])->name('suratm.store');
    Route::get('/suratm/edit/{id}', [SuratmController::class, 'edit'])->name('suratm.edit');
    Route::put('/suratm/{id}', [SuratmController::class, 'update'])->name('suratm.update');
    Route::delete('/suratm/{id}', [SuratmController::class, 'destroy'])->name('suratm.destroy');
    Route::get('/suratm/download/{filename}', [SuratmController::class, 'download'])->name('suratm.download');
    Route::get('/suratm/{id}', [SuratmController::class, 'show'])->name('suratm.show');
    Route::put('/suratm/disposisi/{id}', [SuratmController::class, 'disposisi'])->name('suratm.disposisi');

    //surat keluar
    Route::get('/suratk', [SuratkController::class, 'index'])->name('suratk.index');
    Route::get('/suratk/create', [SuratkController::class, 'create'])->name('suratk.create');
    Route::post('/suratk', [SuratkController::class, 'store'])->name('suratk.store');
    Route::get('/suratk/edit/{id}', [SuratkController::class, 'edit'])->name('suratk.edit');
    Route::put('/suratk/{id}', [SuratkController::class, 'update'])->name('suratk.update');
    Route::delete('/suratk/{id}', [SuratkController::class, 'destroy'])->name('suratk.destroy');
    Route::get('/suratk/download/{filename}', [SuratkController::class, 'download'])->name('suratk.download');
    Route::get('/suratk/{id}', [SuratkController::class, 'show'])->name('suratk.show');

    //Disposisi Surat
    Route::get('/disposisi', [DisposisiController::class, 'index'])->name('disposisi.index');
    Route::get('/disposisi/create', [DisposisiController::class, 'create'])->name('disposisi.create');
    Route::put('/disposisi/{id}', [DisposisiController::class, 'store'])->name('disposisi.store');

    //Jenis Surat
    Route::get('/jenis', [JenisController::class, 'index'])->name('jenis.index');
    Route::post('/jenis', [JenisController::class, 'store'])->name('jenis.store');
    Route::delete('/jenis/{id}', [JenisController::class, 'destroy'])->name('jenis.destroy');

    //User
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

