<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MidtransController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama (landing page / promosi)
Route::get('/', function () {
    return view('landing'); // resources/views/landing.blade.php
});

// Callback Midtrans
Route::post('/midtrans/callback', [MidtransController::class, 'callback']);

// Rute-rute setelah login
Route::middleware(['auth'])->group(function () {

    // Redirect setelah login
    Route::get('/dashboard', function () {
        return redirect(auth()->user()->role === 'admin' ? '/admin' : '/user');
    });

    // Grup Admin
    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::get('/', fn() => view('admin.index'));
        Route::resource('kamar', \App\Http\Controllers\Admin\KamarController::class);
        Route::get('/reservasi', [\App\Http\Controllers\Admin\ReservasiController::class, 'index'])->name('admin.reservasi.index');
        Route::post('/reservasi/{id}/validasi', [\App\Http\Controllers\Admin\ReservasiController::class, 'validasi'])->name('admin.reservasi.validasi');
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    });

    // Grup User
    Route::prefix('user')->middleware('user')->group(function () {
        Route::get('/', fn() => view('user.index'))->name('user.dashboard');
        Route::get('/dashboard', fn() => view('user.index'));
        Route::get('/reservasi', [\App\Http\Controllers\User\ReservasiController::class, 'index']);
        Route::post('/reservasi', [\App\Http\Controllers\User\ReservasiController::class, 'store']);
        Route::get('/bayar/{id}', [\App\Http\Controllers\User\ReservasiController::class, 'bayar'])->name('user.bayar');
    });

});

// Rute otentikasi (login, register, dll)
require __DIR__.'/auth.php';
