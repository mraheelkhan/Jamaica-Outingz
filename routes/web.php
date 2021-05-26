<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UniqueExperienceController;
use App\Http\Controllers\MerchendiseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ScheduleBookingController;
use App\Http\Controllers\PromoCodeController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\GroupPackageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::group(['middleware' => 'auth'], function(){
    Route::resource('/tours', TourController::class);
    Route::resource('/restaurants', RestaurantController::class);
    Route::resource('/unique-experiences', UniqueExperienceController::class);
    Route::resource('/bookings', BookingController::class);
    Route::resource('/merchendises', MerchendiseController::class);
    Route::resource('/registered-guests', GuestController::class);
    Route::resource('/tour-guides', GuideController::class);
    Route::resource('/scheduled-bookings', ScheduleBookingController::class);
    Route::resource('/promo-codes', PromoCodeController::class);
    Route::resource('/group-packages', GroupPackageController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
