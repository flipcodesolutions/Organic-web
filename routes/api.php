<?php

use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\ContactController;
use App\Http\Controllers\api\NotificationController;
use App\Http\Controllers\api\RegisterController;
use App\Http\Controllers\api\SliderController;
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

Route::post('checkEmail', [UserController::class, 'checkEmail']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    //category and products
    Route::get('allCategories', [CategoryController::class, 'allCategories']);

    //user Profile
    Route::get('userProfile', [UserController::class, 'userProfile']);
    Route::post('editProfile', [UserController::class, 'editProfile']);
    Route::post('updateLanguage', [UserController::class, 'updateLanguage']);

    //sliders
    Route::get('sliders', [SliderController::class, 'sliders']);

    //contact review faqs
    Route::post('addContact', [ContactController::class, 'addContact']);
    Route::get('viewFaqs', [ContactController::class, 'viewFaqs']);
    Route::get('review', [ContactController::class, 'review']);
    Route::post('addReview', [ContactController::class, 'addReview']);
    Route::post('updateReview/{id}', [ContactController::class, 'updateReview']);


    //notification
    Route::get('notifications', [NotificationController::class, 'notifications']);
});
