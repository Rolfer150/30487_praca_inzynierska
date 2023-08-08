<?php

use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\OfferController;
use Illuminate\Support\Facades\Route;

Route::get('/offers', [OfferController::class, 'index'])->name('sidewidgets.offer');
Route::get('/offers/{offer}', [OfferController::class, 'show'])->name('sidewidgets.show');

Route::get('/calculator',  [CalculatorController::class, 'index'])->name('sidewidgets.calculator');
//Route::post('/calculator', [CalculatorController::class, 'getSalaryCalculation']);
