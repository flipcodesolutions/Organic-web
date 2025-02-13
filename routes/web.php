<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ImagesController;
use App\Http\Controllers\admin\ModuleController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductPriceController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\admin\CityMasterController;
use App\Http\Controllers\LandmarkMasterController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('permission/index', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('permission/store', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('permission/edit/{id?}', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::post('permission/update/{id?}', [PermissionController::class, 'update'])->name('permission.update');
    Route::get('permission/show/{id?}', [PermissionController::class, 'show'])->name('permission.show');
    Route::get('permission/delete/{id?}', [PermissionController::class, 'delete'])->name('permission.delete');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);


    // category route
    Route::controller(CategoryController::class)->group(function () {
        Route::get('category/index', 'index')->name('category.index');
        Route::get('category/create','create')->name('category.create');
        Route::post('category/store','store')->name('category.store');
        Route::get('category/edit/{id?}', 'edit')->name('category.edit');
        Route::post('category/update/{id?}', 'update')->name('category.update');
        Route::post('category/delete/{id?}', 'update')->name('category.update');
    });

    // product route
    Route::controller(ProductController::class)->group(function () {
        Route::get('product/index', 'index')->name('product.index');
        Route::get('product/create','create')->name('product.create');
        Route::post('product/store','store')->name('product.store');
        Route::get('product/edit/{id?}', 'edit')->name('product.edit');
        Route::post('product/update/{id?}', 'update')->name('product.update');
    });

    // module route
    Route::controller(ModuleController::class)->group(function () {
        Route::get('module/index', 'index')->name('module.index');
    });

    // image route
    Route::controller(ImagesController::class)->group(function () {
        Route::get('image/index', 'index')->name('image.index');
    });

    // product price route
    Route::controller(ProductPriceController::class)->group(function () {
        Route::get('product/price', 'price')->name('product.price.index');
    });

    Route::get('citymaster/index', [CityMasterController::class, 'index'])->name('city_master.index');
Route::get('citymaster/create', [CityMasterController::class, 'create'])->name('city_master.create');
Route::post('citymaster', [CityMasterController::class, 'store'])->name('city_master.store');

});









