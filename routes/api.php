<?php

use Illuminate\Http\Request;
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

// Session default user middleware
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Custom API middleware
Route::apiResource('v1/vehicles', App\Http\Controllers\Api\V1\ApiVehicleController::class)
    ->middleware('authapi');

// Guest API
Route::post('v1/login', [App\Http\Controllers\Api\V1\ApiTokenController::class, 'login']);
Route::get('v1/profile', [App\Http\Controllers\Api\V1\ApiTokenController::class,'profile']);
