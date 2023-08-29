<?php

use App\Http\Controllers\OfferController;
use App\Http\Livewire\SalaryCalculator;
use App\Http\Livewire\Search;
use Illuminate\Support\Facades\Route;

Route::get('/offers', [OfferController::class, 'index'])->name('sidewidgets.offer');
Route::get('/offers/{offer:slug}', [OfferController::class, 'show'])->name('sidewidgets.show');
Route::post('offers/store', [OfferController::class, 'store'])->name('sidewidgets.store');

Route::get('/filter',Search::class)->name('livewire.search');
Route::get('/search', [OfferController::class,'search'])->name('sidewidgets.search');

Route::get('/addoffer',[OfferController::class,'create'])->name('sidewidgets.addoffer');

Route::get('/calculator',SalaryCalculator::class)->name('livewire.salary-calculator');
