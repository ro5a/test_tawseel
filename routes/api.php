<?php

use App\Http\Controllers\Api\Auth\UserController;
use App\Http\Controllers\Api\OrderController;

use Illuminate\Support\Facades\Route;

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

// API Auth





// User API
Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'getData');
});


// Order API
Route::controller(OrderController::class)->group(function () {
    Route::post('/order/{id}', 'change_status');
});
