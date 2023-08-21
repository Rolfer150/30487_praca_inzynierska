<?php

use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\OfferController;
use Illuminate\Support\Facades\Route;

Route::get('/offers', [OfferController::class, 'index'])->name('sidewidgets.offer');
Route::get('/offers/{offer:slug}', [OfferController::class, 'show'])->name('sidewidgets.show');
Route::post('offers/store', [OfferController::class, 'store'])->name('sidewidgets.store');

Route::get('/addoffer',[OfferController::class,'create'])->name('sidewidgets.addoffer');

Route::get('/calculator',  \App\Http\Livewire\SalaryCalculator::class)->name('livewire.salary-calculator');
//Route::post('/calculator', [CalculatorController::class, 'getSalaryCalculation']);
