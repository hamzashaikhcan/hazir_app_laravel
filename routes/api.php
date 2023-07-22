<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// ------- user controller
Route::post('user/register', [UserController::class, 'register']);
Route::post('user/login', [UserController::class, 'login']);
Route::get('userbookings/{id}', [UserController::class, 'getUserBookings']);
// ----- driver controller
Route::post('driver/register', [DriverController::class, 'register']);
Route::post('driver/login', [DriverController::class, 'login']);
Route::get('drivercars/{id}', [DriverController::class, 'getDriverCars']);
Route::get('driverbookings/{id}', [DriverController::class, 'getDriverBookings']);
Route::post('driverupdate', [DriverController::class, 'driverupdateProfile']);
// -------- car controller 
Route::post('storeCar', [CarController::class, 'storeCar']);
Route::get('allcars', [CarController::class, 'allCar']);
Route::get('deletecar/{id}', [CarController::class, 'deleteCar']);
Route::post('carupdate/{id}', [CarController::class, 'carUpdate']);
Route::get('carstatus/{id}', [CarController::class, 'carStatus']);
Route::post('searchcars', [CarController::class, 'searchCars']);
// ---------- booking controller 
Route::post('bookCar', [BookingController::class, 'bookCar']);
