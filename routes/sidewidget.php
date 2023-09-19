<?php

use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OfferApplicationController;
use App\Http\Middleware\Authenticate;
use App\Livewire\SalaryCalculator;
use App\Livewire\Search;
use Illuminate\Support\Facades\Route;

//Route::get('/offers', [OfferController::class, 'index'])->name('sidewidgets.offer');
Route::get('/offers/{offer:slug}', [OfferController::class, 'show'])->name('sidewidgets.show');


Route::get('/offers', Search::class)->name('livewire.search');
Route::get('/offers/search', [OfferController::class, 'search'])->name('sidewidgets.search');


Route::get('/calculator', SalaryCalculator::class)->name('livewire.salary-calculator');

Route::middleware('auth')->group(function () {
    Route::get('/myoffers/addoffer', [OfferController::class, 'create'])->name('sidewidgets.addoffer');
    Route::post('/myoffers/store', [OfferController::class, 'store'])->name('sidewidgets.offerstore');
    Route::get('/myoffers/appliedoffers', [OfferApplicationController::class, 'index'])->name('sidewidgets.applyindex');
    Route::get('/myoffers/apply/{offer:slug}', [OfferApplicationController::class, 'apply'])->name('sidewidgets.applyoffer');
    Route::post('/myoffers/apply/store', [OfferApplicationController::class, 'store'])->name('sidewidgets.applystore');
    Route::delete('/myoffers/apply/{offer_application}', [OfferApplicationController::class, 'destroy'])->name('sidewidgets.applydestroy');


    Route::get('/myoffers/favourites', [FavouriteController::class, 'index'])->name('favourites');
    Route::delete('/favourites/{favourite}', [FavouriteController::class, 'destroy'])->name('favourites.destroy');
});
