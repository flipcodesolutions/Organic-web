<?php

// category api
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\RegisterController;

// Route::controller(CategoryController::class)->group(function () {
//     Route::get('getcategory', 'getcategory')->name('category.getcategory');
// });

Route::controller(RegisterController::class)->group(function () {
    Route::post('/register', 'register')->name('register');
});

Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
});