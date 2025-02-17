<?php

use App\Http\Controllers\admin\CityMasterController;
use App\Http\Controllers\admin\LandmarkMasterController;
use Illuminate\Support\Facades\Route;

Route::get('city/index', [CityMasterController::class, 'index'])->name('city_master.index');
Route::get('city/create', [CityMasterController::class, 'create'])->name('city_master.create');
Route::post('city/store', [CityMasterController::class, 'store'])->name('city_master.store');
Route::get('city/edit/{id?}', [CityMasterController::class, 'edit'])->name('city_master.edit');
Route::post('city/update/{id?}', [CityMasterController::class, 'update'])->name('city_master.update');
Route::get('city/show/{id?}', [CityMasterController::class, 'show'])->name('city_master.show');


Route::get('landmark/index', [LandmarkMasterController::class, 'index'])->name('landmark.index');
Route::get('landmark/create', [LandmarkMasterController::class, 'create'])->name('landmark.create');
Route::post('landmark/store', [LandmarkMasterController::class, 'store'])->name('landmark.store');
Route::get('landmark/edit/{id?}', [LandmarkMasterController::class, 'edit'])->name('landmark.edit');
Route::post('landmark/update/{id?}', [LandmarkMasterController::class, 'update'])->name('landmark.update');
Route::get('landmark/show/{id?}', [LandmarkMasterController::class, 'show'])->name('landmark.show');


?>