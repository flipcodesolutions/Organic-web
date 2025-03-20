<?php

use App\Http\Controllers\admin\CityMasterController;
use App\Http\Controllers\admin\LandmarkMasterController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\AdminReviewController;
use App\Http\Controllers\vendor\VendorReviewController;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

use App\Http\Controllers\vendor\PurchaseController;

use Illuminate\Support\Facades\Route;

Route::get('city/index', [CityMasterController::class, 'index'])->name('city_master.index');
Route::get('city/create', [CityMasterController::class, 'create'])->name('city_master.create');
Route::post('city/store', [CityMasterController::class, 'store'])->name('city_master.store');
Route::get('city/edit/{id?}', [CityMasterController::class, 'edit'])->name('city_master.edit');
Route::post('city/update/{id}', [CityMasterController::class, 'update'])->name('city_master.update');
Route::get('city/show/{id?}', [CityMasterController::class, 'show'])->name('city_master.show');

Route::get('city/deactive/{id?}', [CityMasterController::class, 'deactive'])->name('city_master.deactive');
Route::get('city/deleted', [CityMasterController::class, 'deleted'])->name('city_master.deleted');
Route::get('city/active/{id?}', [CityMasterController::class, 'active'])->name('city_master.active');
Route::get('city/destroy/{id?}', [CityMasterController::class, 'destroy'])->name('city_master.destroy');



Route::get('landmark/index', [LandmarkMasterController::class, 'index'])->name('landmark.index');
Route::get('landmark/create', [LandmarkMasterController::class, 'create'])->name('landmark.create');
Route::post('landmark/store', [LandmarkMasterController::class, 'store'])->name('landmark.store');
Route::get('landmark/edit/{id?}', [LandmarkMasterController::class, 'edit'])->name('landmark.edit');
Route::post('landmark/update/{id?}', [LandmarkMasterController::class, 'update'])->name('landmark.update');
Route::get('landmark/show/{id?}', [LandmarkMasterController::class, 'show'])->name('landmark.show');

Route::get('landmark/deactive/{id?}', [LandmarkMasterController::class, 'deactive'])->name('landmark.deactive');
Route::get('landmark/deleted', [LandmarkMasterController::class, 'deleted'])->name('landmark.deleted');
Route::get('landmark/active/{id?}', [LandmarkMasterController::class, 'active'])->name('landmark.active');
Route::get('landmark/destroy/{id?}', [LandmarkMasterController::class, 'destroy'])->name('landmark.destroy');

Route::get('contact',[ContactController::class,'index'])->name('contact.index');

Route::get('/admin/reviews', [AdminReviewController::class, 'index'])->name('admin.reviews.index');

Route::get('/vendor/reviews', [VendorReviewController::class, 'index'])->name('vendor.reviews.index');



Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');



Route::get('purchase/index', [PurchaseController::class, 'index'])->name('purchases.index');
Route::get('purchase/create', [PurchaseController::class, 'create'])->name('purchases.create');
Route::post('purchase/store', [PurchaseController::class, 'store'])->name('purchases.store');
Route::get('purchase/edit/{id?}', [PurchaseController::class, 'edit'])->name('purchases.edit');
Route::post('purchase/update/{id?}', [PurchaseController::class, 'update'])->name('purchases.update');
Route::get('purchase/show/{id?}', [PurchaseController::class, 'show'])->name('purchases.show');
Route::get('purchase/destroy/{id?}', [PurchaseController::class, 'destroy'])->name('purchases.destroy');




