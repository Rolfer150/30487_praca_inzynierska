<?php

use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\NotificationController;
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

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'myoffers'], function () {
        Route::get('/', [OfferController::class, 'index'])->name('sidewidgets.myoffers');
        Route::get('/addoffer', [OfferController::class, 'create'])->name('sidewidgets.addoffer');
        Route::post('/store', [OfferController::class, 'store'])->name('sidewidgets.offerstore');
        Route::get('/appliedoffers', [OfferApplicationController::class, 'index'])->name('sidewidgets.applyindex');
        Route::get('/apply/{offer:slug}', [OfferApplicationController::class, 'apply'])->name('sidewidgets.applyoffer');
        Route::post('/apply/store', [OfferApplicationController::class, 'store'])->name('sidewidgets.applystore');
        Route::delete('/apply/{offer_application}', [OfferApplicationController::class, 'destroy'])->name('sidewidgets.applydestroy');
    });

    Route::group(['prefix' => 'favourites'], function () {
        Route::get('/', [FavouriteController::class, 'index'])->name('sidewidgets.favouritesindex');
        Route::delete('/{favourite}', [FavouriteController::class, 'destroy'])->name('sidewidgets.favouritesdestroy');
    });

    Route::group(['prefix' => 'notifications'], function () {
        Route::get('/', [NotificationController::class, 'index'])->name('sidewidgets.notificationsindex');
    });
});
