<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\prosesController;
use App\Http\Controllers\bmsController;
use App\Http\Controllers\mscontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::controller(PelaporanController::class)->prefix('pelaporan')->group( function (){
    Route::get('','index')->name('pelaporan');
});

Route::post('/pelaporan/posting', [App\Http\Controllers\PelaporanController::class, 'upload']);


// Route::post('/claim/upload', [App\Http\Controllers\ClaimController::class, 'upload']);
Route::post('/claim/update/{id}', [ClaimController::class, 'update']);
Route::get('/claim/pdf/{id}/{fileType}', [ClaimController::class, 'showPdf'])->name('claim.showPdf');
Route::get('/claim/pdf/{id}/{field}', [ClaimController::class, 'pdf']);
Route::get('/claim/file/{id}/{type}', [ClaimController::class, 'showFile'])->name('claim.file');
Route::get('/claim/download/{id}/{fileType}', [ClaimController::class, 'download'])->name('claim.download');
Route::post('/claim/upload', [ClaimController::class, 'upload'])->name('claim.store');

Route::controller(ClaimController::class)->prefix('claim')->group( function(){
    Route::get('','index')->name('claim');
});

Route::controller(prosesController::class)->prefix('proses')->group(function () {
    Route::get('/', 'index')->name('proses');
});
Route::post('/proses/upload', [prosesController::class, 'upload'])->name('proses.store');

Route::controller(bmsController::class)->prefix('bms')->group(function () {
    Route::get('/', 'index')->name('bms');
});

Route::controller(msController::class)->prefix('ms')->group(function () {
    Route::get('/', 'index')->name('ms');
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index']);

// Route to handle the form submission
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');