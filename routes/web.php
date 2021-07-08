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
use App\Http\Controllers\PickupController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RestaurantTypeController;

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

Route::group(['middleware' => ['auth', 'user_role']], function(){
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
    Route::resource('/categories', CategoryController::class);
    Route::resource('/items', ItemController::class);
    Route::resource('/locations', LocationController::class);
    Route::resource('/restaurant-types', RestaurantTypeController::class);
    Route::get('/tours/image/{id}/delete', [TourController::class, 'delete_image'])->name('tour_image.delete');
    Route::get('/restaurant/image/{id}/delete', [RestaurantController::class, 'delete_image'])->name('restaurant_image.delete');
    Route::get('/unique-experiences/image/{id}/delete', [UniqueExperienceController::class, 'delete_image'])->name('unique-experiences.delete');
    Route::get('/items/image/{id}/delete', [ItemController::class, 'delete_image'])->name('item_image.delete');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


require __DIR__.'/auth.php';
