<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\prosesController;
use App\Http\Controllers\bmsController;
use App\Http\Controllers\tmsController;
use App\Http\Controllers\mscontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\userController;
use App\Http\Controllers\ubahpasswordController;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);



// Semua route yang membutuhkan autentikasi diletakkan dalam grup middleware 'auth'
Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(PelaporanController::class)->prefix('pelaporan')->group(function () {
        Route::get('', 'index')->name('pelaporan');
    });

    Route::post('/pelaporan/posting', [PelaporanController::class, 'upload']);
    Route::get('/pelaporan/download/{id}/{fileType}', [PelaporanController::class, 'download'])->name('pelaporan.download');

    Route::post('/claim/update/{id}', [ClaimController::class, 'update']);
    Route::get('/claim/pdf/{id}/{fileType}', [ClaimController::class, 'showPdf'])->name('claim.showPdf');
    Route::get('/claim/pdf/{id}/{field}', [ClaimController::class, 'pdf']);
    Route::get('/claim/file/{id}/{type}', [ClaimController::class, 'showFile'])->name('claim.file');
    Route::get('/claim/download/{id}/{fileType}', [ClaimController::class, 'download'])->name('claim.download');
    Route::post('/claim/upload', [ClaimController::class, 'upload'])->name('claim.store');

    Route::controller(ClaimController::class)->prefix('claim')->group(function () {
        Route::get('', 'index')->name('claim');
    });

    Route::controller(prosesController::class)->prefix('proses')->group(function () {
        Route::get('/', 'index')->name('proses');
    });
    Route::post('/proses/upload', [prosesController::class, 'upload'])->name('proses.store');

    Route::controller(bmsController::class)->prefix('bms')->group(function () {
        Route::get('/', 'index')->name('bms');
    });
    Route::controller(tmsController::class)->prefix('tms')->group(function () {
        Route::get('/', 'index')->name('tms');
    });

    Route::controller(msController::class)->prefix('ms')->group(function () {
        Route::get('/', 'index')->name('ms');
    });
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    // routes/web.php

    Route::get('/mark-as-read/{id}', function($id) {
        $notification = auth()->user()->unreadNotifications->find($id);
        if ($notification) {
            $notification->markAsRead();
        }
        return redirect()->back();
    })->name('markAsRead');

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::get('/detail', [UserController::class, 'index'])->name('detail');
    Route::get('/detail/{id}', [UserController::class, 'detail'])->name('user_detail');
    Route::post('/detail/{id}', [UserController::class, 'updatePassword'])->name('update_password');
    


    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/ubah', [ubahpasswordController::class, 'index']);
    
    Route::post('/ubah', [ubahpasswordController::class, 'upload']);
});
