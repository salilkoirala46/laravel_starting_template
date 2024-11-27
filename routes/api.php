<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\RegisterController;

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

   
Route::controller(RegisterController::class)->group(function(){
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

Route::middleware('auth:sanctum')->group(function(){
    // Route::apiResource('cars', CarController::class); //we can do this or we can do from controller
    // Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');
});

Route::apiResource('cars', CarController::class);
Route::post('/cars/{car}/upload-image', [CarController::class, 'uploadImage']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

