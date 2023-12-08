<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OfferController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',  [OfferController::class, 'mainPage'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')
    ->controller(ProfileController::class)
    ->name('profile.')
    ->group(function () {
    Route::get('/profile','edit')->name('edit');
    Route::get('/profile{user}','show')->name('show');
    Route::patch('/profile','update')->name('update');
    Route::delete('/profile','destroy')->name('destroy');
});

require __DIR__.'/auth.php';
require __DIR__ . '/sidewidget.php';
