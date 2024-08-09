<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\ClaimController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::controller(PelaporanController::class)->prefix('pelaporan')->group( function (){
    Route::get('','index')->name('pelaporan');
});

Route::post('/posting', [App\Http\Controllers\PelaporanController::class, 'upload']);

Route::controller(ClaimController::class)->prefix('claim')->group( function(){
    Route::get('','index')->name('claim');
});