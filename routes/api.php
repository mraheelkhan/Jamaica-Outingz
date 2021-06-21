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
use App\Http\Controllers\API\RestaurantController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\SearchController;

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
    Route::resource('/categories', CategoryController::class);
    Route::resource('/items', ItemController::class);
    Route::post('/contacts', [ContactController::class, 'contact']);
    
    Route::resource('/orders', OrderController::class);
});

Route::resource('/restaurants', RestaurantController::class);
Route::prefix('public')->group(function () {
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
    Route::post('/contacts', [ContactController::class, 'contact']);
    
    Route::resource('/orders', OrderController::class);
});
