<?php

use App\Http\Controllers\admin\CityMasterController;
use App\Http\Controllers\admin\LandmarkMasterController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\vendor\VendorReviewController;

use Illuminate\Support\Facades\Route;

Route::get('city/index', [CityMasterController::class, 'index'])->name('city_master.index');
Route::get('city/create', [CityMasterController::class, 'create'])->name('city_master.create');
Route::post('city/store', [CityMasterController::class, 'store'])->name('city_master.store');
Route::get('city/edit/{id?}', [CityMasterController::class, 'edit'])->name('city_master.edit');
Route::post('city/update/{id?}', [CityMasterController::class, 'update'])->name('city_master.update');
Route::get('city/show/{id?}', [CityMasterController::class, 'show'])->name('city_master.show');
Route::get('city/delete/{id}', [CityMasterController::class, 'delete'])->name('city_master.delete');
Route::get('city/active/{id}',[CityMasterController::class, 'active'])->name('city_master.active');
Route::get('city/deactive', [CityMasterController::class,'deactivedata'])->name('city_master.deactivedata');
Route::get('city/permdelete/{id}',[CityMasterController::class,'permdelete'])->name('city_master.permdelete');


Route::get('landmark/index', [LandmarkMasterController::class, 'index'])->name('landmark.index');
Route::get('landmark/create', [LandmarkMasterController::class, 'create'])->name('landmark.create');
Route::post('landmark/store', [LandmarkMasterController::class, 'store'])->name('landmark.store');
Route::get('landmark/edit/{id?}', [LandmarkMasterController::class, 'edit'])->name('landmark.edit');
Route::post('landmark/update/{id?}', [LandmarkMasterController::class, 'update'])->name('landmark.update');
Route::get('landmark/show/{id?}', [LandmarkMasterController::class, 'show'])->name('landmark.show');
Route::get('landmark/delete/{id?}', [LandmarkMasterController::class, 'delete'])->name('landmark.delete');
Route::get('landmark/active/{id?}', [LandmarkMasterController::class, 'active'])->name('landmark.active');
Route::get('landmark/deactive/{id?}', [LandmarkMasterController::class, 'deactive'])->name('landmark.deactive');
Route::get('landmark/permdelete/{id?}', [LandmarkMasterController::class, 'permdelete'])->name('landmark.permdelete');

Route::get('contact',[ContactController::class,'index'])->name('contact.index');

Route::get('review',[ReviewController::class,'index'])->name('review.index');



Route::get('vendor/reviews', [VendorReviewController::class, 'index'])->name('vendor.reviews.index');





?>
