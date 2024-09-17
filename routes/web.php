<?php

use App\Http\Controllers\DashboarController;
use App\Http\Controllers\GelombangController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\LevelMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('logout', [LoginController::class, 'index'])->name('logout');
Route::post('login', [LoginController::class, 'actionLogin'])->name('action.login');
Route::middleware(['auth'])->group(function (): void {

    Route::get('peserta/tidaklolos', [DashboarController::class, 'pesertTidakLolos'])->name('tidakLolos');
    Route::get('peserta/lolos', [DashboarController::class, 'pesertaLolos'])->name('lolos');
    Route::get('/dashboard', [DashboarController::class, 'index'])->name('dashboard');
    Route::post('/gelombang/{id}/update-status', [GelombangController::class, 'updateStatus'])->name('gelombang.updateStatus');
    Route::post('/peserta/{id}/seleksi', [PesertaController::class, 'updatePeserta']);
    Route::post('/cari_peserta', [PesertaController::class, 'cariPeserta'])->name('cari.jurusan');
    Route::resource('peserta', PesertaController::class);

    Route::post('status/{id}', [PesertaController::class, 'updateStatus']);
    Route::middleware(['level:Administrator'])->group(function () {

        Route::resource('role', RolesController::class);
        Route::resource('gelombang', GelombangController::class);
        Route::resource('jurusan', JurusanController::class);
        Route::resource('users', UserController::class);

        Route::get('recycle-user', [UserController::class, 'user_recycle'])->name('user.recycle');
        Route::post('restore-user/{id}', [UserController::class, 'restore'])->name('user.restore');
        Route::delete('deletePermanent-user/{id}', [UserController::class, 'deletePermanent'])->name('user.deletePermanent');

        Route::get('jurusan-recycle', [JurusanController::class, 'jurusan_recycle'])->name('jurusan.recycle');
        Route::post('restore-jurusan/{id}', [JurusanController::class, 'restore'])->name('jurusan.restore');
        Route::delete('deletePermanent-jurusan/{id}', [JurusanController::class, 'deletePermanent'])->name('jurusan.deletePermanent');

        Route::get('gelombang-recycle', [GelombangController::class, 'gelombang_recycle'])->name('gelombang.recycle');
        Route::post('gelombang-restore/{id}', [GelombangController::class, 'restore'])->name('gelombang.restore');
        Route::delete('deletePermanent-gelombang/{id}', [GelombangController::class, 'deletePermanent'])->name('gelombang.deletePermanent');

        Route::get('role-recycle', [RolesController::class, 'role_recycle'])->name('role.recycle');
        Route::post('restore-role/{id}', [RolesController::class, 'restore'])->name('role.restore');
        Route::delete('deletePermanent-jurusan/{id}', [RolesController::class, 'deletePermanent'])->name('role.deletePermanent');
    });
});

// Route::get('/daftar', [PendaftaranController::class,'index']);
Route::get('/', [PendaftaranController::class, 'index']);
Route::get('/confirm', [PendaftaranController::class, 'thanks'])->name('thanks');
