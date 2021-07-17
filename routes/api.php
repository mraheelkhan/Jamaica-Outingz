<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TourController;
use App\Http\Controllers\API\GroupController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\API\FavouriteController;
use App\Http\Controllers\API\BookingController;
use App\Http\Controllers\API\PickupController;
use App\Http\Resources\ProfileResource;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ItemController;
use App\Http\Controllers\API\LocationController;
use App\Http\Controllers\API\RestaurantController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\HelpController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\api\PaymentController;
use App\Http\Controllers\API\SearchController;
use App\Http\Controllers\API\UniqueExperienceController;
use App\Http\Controllers\API\RestaurantTypeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/profile', function (Request $request) {
        return response()->json(new ProfileResource($request->user()));
    });

    Route::resource('/tours', TourController::class);
    Route::resource('/group-packages', GroupController::class);
    Route::resource('/reviews', ReviewController::class);
    Route::resource('/favourites', FavouriteController::class);
    Route::resource('/bookings', BookingController::class);
    Route::resource('/pickups', PickupController::class);
    Route::post('/help', [HelpController::class,'help']);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/items', ItemController::class);
    Route::post('/contacts', [ContactController::class, 'contact']);
    
    Route::resource('/orders', OrderController::class);
});

Route::prefix('public')->group(function () {
    Route::resource('/restaurants', RestaurantController::class);
    Route::get('/search-tours/{text}', [SearchController::class, 'search_tours']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/profile', function (Request $request) {
        return response()->json(new ProfileResource($request->user()));
    });
    
    Route::resource('/tours', TourController::class);
    Route::resource('/group-packages', GroupController::class);
    Route::resource('/reviews', ReviewController::class);
    Route::resource('/favourites', FavouriteController::class);
    Route::resource('/bookings', BookingController::class);
    Route::resource('/pickups', PickupController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/items', ItemController::class);
    Route::post('/help', [HelpController::class,'help']);
    Route::post('/contacts', [ContactController::class, 'contact']);
    //Route::paument('/payment', PaymentController::class,);
    Route::resource('/unique-experiences', UniqueExperienceController::class);
    Route::resource('/locations', LocationController::class);
    Route::resource('/restaurant-types', RestaurantTypeController::class);
    Route::get('/restaurants/{location_id}/{type_id}', [RestaurantController::class, 'restaurants']);
    
    Route::resource('/orders', OrderController::class);
});
