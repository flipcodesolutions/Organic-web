<?php

use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\RegisterController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/registerApi', [RegisterController::class, 'registerApi']);

Route::get('users', [UserController::class, 'index']);
Route::post('user/store', [UserController::class, 'store']);

Route::post('sendOtp', [UserController::class, 'sendOtp']);
Route::post('verifyOtp', [UserController::class, 'verifyOtp']);

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('allCategories', [CategoryController::class, 'allCategories']);
});
