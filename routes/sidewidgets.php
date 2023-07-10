<?php

use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\OfferController;
use Illuminate\Support\Facades\Route;

Route::get('/offers', [OfferController::class, 'index'])->name('offer');

Route::get('/calculator',  [CalculatorController::class, 'index'])->name('calculator');
//Route::post('/calculator', [CalculatorController::class, 'getSalaryCalculation']);
