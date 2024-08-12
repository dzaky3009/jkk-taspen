<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\ClaimController;


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