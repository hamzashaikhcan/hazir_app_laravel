<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect('login');
});
// Route::get('/', [Controller::class, 'login']);
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('addcar', [AdminController::class, 'addCar']);
    Route::post('storecar', [AdminController::class, 'storeCar'])->name('car.store');
    Route::get('allcars', [AdminController::class, 'allCars'])->name('allcars');
    Route::get('delete-car/{id}', [AdminController::class, 'deleteCars']);
    Route::get('allusers', [AdminController::class, 'allusers']);
    Route::get('adduser', [AdminController::class, 'addUsers']);
    Route::post('storeuser', [AdminController::class, 'storeUser'])->name('user.store');
    Route::get('delete-user/{id}', [AdminController::class, 'deleteUser']);
    Route::get('profile', [AdminController::class, 'profile']);
    Route::post('profile-update', [AdminController::class, 'profileUpdate'])->name('profile.update');
    Route::post('profile-password', [AdminController::class, 'profilePassword'])->name('profile.password');
    
});


// -- logout 
Route::post('logout', [AdminController::class, 'logout'])->name('logout');
// Route::get('/', [Controller::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
