<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CityMasterController;
use App\Http\Controllers\admin\LandmarkMasterController;

use App\Http\Controllers\admin\Cms_MasterController;
use App\Http\Controllers\admin\DeliverySlotController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\ImagesController;
use App\Http\Controllers\admin\ModuleController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductPriceController;
use Illuminate\Support\Facades\Auth;

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



    // delivery slot route
    Route::controller(DeliverySlotController::class)->group(function () {
        Route::get('deliveryslot/index', 'index')->name('deliveryslot.index');
        Route::get('deliveryslot/create', 'create')->name('deliveryslot.create');
        Route::post('deliveryslot/store', 'store')->name('deliveryslot.store');
        Route::get('deliveryslot/edit/{id}', 'edit')->name('deliveryslot.edit');
        Route::post('deliveryslot/update/{id}', 'update')->name('deliveryslot.update');
    });

    //cms_master route
    Route::controller(Cms_MasterController::class)->group(function () {
        Route::get('cms_master/index', 'index')->name('cms_master.index');
        Route::get('cms_master/create', 'create')->name('cms_master.create');
        Route::post('cms_master/store', 'store')->name('cms_master.store');
        Route::get('cms_master/edit/{id}', 'edit')->name('cms_master.edit');
        Route::post('cms_master/update/{id}', 'update')->name('cms_master.update');
    });

    //faq route
    Route::controller(FaqController::class)->group(function () {
        Route::get('faq/index', 'index')->name('faq.index');
        Route::get('faq/create', 'create')->name('faq.create');
        Route::post('faq/store', 'store')->name('faq.store');
        Route::get('faq/edit/{id}', 'edit')->name('faq.edit');
        Route::post('faq/update/{id}', 'update')->name('faq.update');
    });

});
