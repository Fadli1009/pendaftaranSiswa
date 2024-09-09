<?php

use App\Http\Controllers\DashboarController;
use App\Http\Controllers\GelombangController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// routes/web.php
Route::get('dashboard', [DashboarController::class, 'index'])->name('dashboard');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('logout', [LoginController::class, 'index'])->name('logout');
Route::post('login', [LoginController::class, 'actionLogin'])->name('action.login');
Route::post('/gelombang/{id}/update-status', [GelombangController::class, 'updateStatus'])->name('gelombang.updateStatus');
Route::resource('role', RolesController::class);
Route::resource('gelombang', GelombangController::class);
Route::resource('jurusan', JurusanController::class);
Route::resource('users', UserController::class);
Route::resource('peserta', PesertaController::class);

// Route::get('/daftar', [PendaftaranController::class,'index']);
Route::get('daftar', [PendaftaranController::class, 'index']);
