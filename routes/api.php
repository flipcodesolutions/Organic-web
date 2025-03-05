<?php

use App\Http\Controllers\api\common\NotificationController;
use App\Http\Controllers\api\common\RegisterController;
use App\Http\Controllers\api\common\UserController;
use App\Http\Controllers\api\customer\CartController;
use App\Http\Controllers\api\customer\CategoryController;
use App\Http\Controllers\api\customer\CityController;
use App\Http\Controllers\api\customer\ContactController;
use App\Http\Controllers\api\customer\OrderController;
use App\Http\Controllers\api\customer\ProductController;
use App\Http\Controllers\api\customer\ShippingAddressController;
use App\Http\Controllers\api\customer\SliderController;
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
Route::post('createProfile', [UserController::class, 'createProfile']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    //category
    Route::get('allCategories', [CategoryController::class, 'allCategories']);

    //user
    Route::post('isVerified', [UserController::class, 'isVerified']);
    Route::get('userProfile', [UserController::class, 'userProfile']);
    Route::post('editProfile', [UserController::class, 'editProfile']);
    Route::post('updateLanguage', [UserController::class, 'updateLanguage']);
    Route::post('updateFcmToken', [UserController::class, 'updateFcmToken']);
    




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

    //cities with landmark
    Route::get('citiesWithLandmark', [CityController::class, 'citiesWithLandmark']);

    //shipping with landmark
    Route::get('shippingWithLandmark', [ShippingAddressController::class, 'shippingWithLandmark']);
    Route::post('addShippingAddress', [ShippingAddressController::class, 'addShippingAddress']);
    Route::post('updateShippingAddress/{id}', [ShippingAddressController::class, 'updateShippingAddress']);
    Route::get('shippingWithLandmarkUser', [ShippingAddressController::class, 'shippingWithLandmarkUser']);
    Route::post('deleteShippingAddress/{id}', [ShippingAddressController::class, 'deleteShippingAddress']);

    //cart
    Route::post('addCart', [CartController::class, 'addCart']);
    Route::get('cartList', [CartController::class, 'cartList']);
    Route::post('updateCart/{id}', [CartController::class, 'updateCart']);
    Route::post('removeCart/{id}', [CartController::class, 'removeCart']);

    //order 
    Route::post('order', [OrderController::class, 'order']);
    Route::get('myOrders', [OrderController::class, 'myOrders']);
    Route::get('orderDetails/{id}', [OrderController::class, 'orderDetails']);
    Route::get('pointPer', [OrderController::class, 'pointPer']);

    //product 
    Route::get('products', [ProductController::class, 'products']);
});
