<?php

use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OfferApplicationController;
use App\Http\Controllers\QuestionnaireController;
use App\Livewire\QuestionnaireForm;
use App\Livewire\SalaryCalculator;
use App\Livewire\Search;
use Illuminate\Support\Facades\Route;

//Route::get('/offers', [OfferController::class, 'index'])->name('sidewidgets.offer');
Route::get('/offers/{offer:slug}', [OfferController::class, 'show'])->name('offer.show');

Route::get('/offers', Search::class)->name('livewire.search');
//Route::get('/offers/search', [OfferController::class, 'search'])->name('sidewidgets.search');


Route::get('/calculator', SalaryCalculator::class)->name('livewire.salary-calculator');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'myoffers'], function () {
        Route::get('/', [OfferController::class, 'index'])->name('offer.myoffers');
        Route::get('/addoffer', [OfferController::class, 'create'])->name('offer.create');
        Route::post('/store', [OfferController::class, 'store'])->name('offer.store');
        Route::get('/appliedoffers', [OfferApplicationController::class, 'index'])->name('offer-application.index');
        Route::get('/apply/{offer:slug}', [OfferApplicationController::class, 'apply'])->name('offer-application.create');
        Route::post('/apply/store', [OfferApplicationController::class, 'store'])->name('offer-application.store');
        Route::delete('/apply/{offer_application}', [OfferApplicationController::class, 'destroy'])->name('offer-application.destroy');
    });

    Route::group(['prefix' => 'favourite'], function () {
        Route::get('/', [FavouriteController::class, 'index'])->name('favourite.index');
        Route::delete('/{favourite}', [FavouriteController::class, 'destroy'])->name('favourite.destroy');
    });

    Route::group(['prefix' => 'notifications'], function () {
        Route::get('/', [NotificationController::class, 'index'])->name('notification.index');
    });

    Route::group(['prefix' => 'questionnaire'], function () {
        Route::get('/',[QuestionnaireController::class, 'index'])->name('questionnaire.index');
        Route::get('/create', QuestionnaireForm::class)->name('livewire.questionnaire');
        Route::post('/store', [QuestionnaireController::class, 'store'])->name('questionnaire.store');
    });
});
