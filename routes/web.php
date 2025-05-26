<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// routes/web.php

// routes/web.php
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect(auth()->user()->role === 'admin' ? '/admin' : '/user');
    });

    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::get('/', fn() => view('admin.index'));
        Route::resource('kamar', \App\Http\Controllers\Admin\KamarController::class);
        
    });

    Route::prefix('user')->middleware('user')->group(function () {
        Route::get('/', fn() => view('user.index'));
        Route::get('/dashboard', fn() => view('user.index')); // ⬅️ tambahkan ini
        Route::get('/dashboard', fn() => view('user.index'))->name('user.dashboard');


        Route::get('/reservasi', [\App\Http\Controllers\User\ReservasiController::class, 'index']);
        Route::post('/reservasi', [\App\Http\Controllers\User\ReservasiController::class, 'store']);
    });
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users')->middleware('admin');
});



require __DIR__.'/auth.php';
