<?php

use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ImagesController;
use App\Http\Controllers\admin\NavigateMasterController;
use App\Http\Controllers\admin\NotificationController;
use App\Http\Controllers\admin\PointPerController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductPriceController;
use App\Http\Controllers\vendor\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// user route
Route::controller(UserController::class)->group(function(){
    Route::get('user/index','index')->name('user.index');
    Route::get('user/create','create')->name('user.create');
    Route::post('user/store','store')->name('user.store');
    Route::get('user/edit/{id?}','edit')->name('user.edit');
    Route::post('user/update/{id?}','update')->name('user.update');
    Route::get('user/deactive/{id?}','deactive')->name('user.deactive');
    Route::get('user/active/{id?}','active')->name('user.active');
    Route::get('user/deactiveindex','deactiveindex')->name('user.deactiveindex');
    Route::get('user/delete/{id?}','destroy')->name('user.delete');
    Route::get('user/changepassword','changepassword')->name('change.password');
    Route::post('user/updatepassword','updatepassword')->name('update.password');
});

// category route
Route::controller(CategoryController::class)->group(function () {
    Route::get('category/index', 'index')->name('category.index');
    Route::get('category/create', 'create')->name('category.create');
    Route::post('category/store', 'store')->name('category.store');
    Route::get('category/edit/{id?}', 'edit')->name('category.edit');
    Route::post('category/update/{id?}', 'update')->name('category.update');
    Route::get('category/deactive/{id?}', 'deactive')->name('category.deactive');
    Route::get('category/active/{id?}', 'active')->name('category.active');
    Route::get('category/deactiveindex', 'deleted')->name('category.deactiveindex');
    Route::get('category/delete/{id?}', 'destroy')->name('category.delete');
});

// product route
Route::controller(ProductController::class)->group(function () {
    Route::get('product/index', 'index')->name('product.index');
    Route::get('product/create', 'create')->name('product.create');
    Route::post('product/store', 'store')->name('product.store');
    Route::get('product/edit/{id?}', 'edit')->name('product.edit');
    Route::post('product/update/{id?}', 'update')->name('product.update');
    Route::get('product/deactive/{id?}', 'deactive')->name('product.deactive');
    Route::get('product/deactiveproducts', 'deactiveindex')->name('product.deactiveindex');
    Route::get('product/active/{id?}','active')->name('product.active');
    Route::get('product/delete/{id?}','destroy')->name('product.delete');
    Route::get('product/image/delete/{id?}','destroyimage')->name('productimage.delete');
    Route::get('product/unit/delete/{id?}','destroyunit')->name('productunit.delete');
    // for stock update
    Route::get('stock/index','stockindex')->name('stock.index');
    Route::post('stock/update/{id?}','stockupdate')->name('stock.update');
});

// Navigate route
Route::controller(NavigateMasterController::class)->group(function(){
    Route::get('navigate/index','index')->name('navigate.index');
    Route::get('navigate/create','create')->name('navigate.create');
    Route::post('navigate/store','store')->name('navigate.store');
    Route::get('navigate/edit/{id?}','edit')->name('navigate.edit');
    Route::post('navigate/update/{id?}','update')->name('navigate.update');
    Route::get('navigate/deactive/{id?}','deactive')->name('navigate.deactive');
    Route::get('navigate/deactiveindex','deactiveindex')->name('navigate.deactiveindex');
    Route::get('navigate/active/{id?}','active')->name('navigate.active');
    Route::get('navigate/delete/{id?}','destroy')->name('navigate.delete');
});

// Notification route
Route::controller(NotificationController::class)->group(function(){
    Route::get('notification/index','index')->name('notification.index');
    Route::get('notification/create','create')->name('notification.create');
    Route::post('notification/store','store')->name('notification.store');
    Route::get('notification/edit/{id?}','edit')->name('notification.edit');
    Route::post('notification/update/{id?}','update')->name('notification.update');
    Route::get('notification/deactive/{id?}','deactive')->name('notification.deactive');
    Route::get('notification/deactiveindex','deactiveindex')->name('notification.deactiveindex');
    Route::get('notification/active/{id?}','active')->name('notification.active');
    Route::get('notification/delete/{id?}','destroy')->name('notification.delete');
});

// point per route
Route::controller(PointPerController::class)->group(function(){
    Route::get('pointper/index','index')->name('pointper.index');
    Route::get('pointper/edit/{id?}','edit')->name('pointper.edit');
    Route::post('pointper/update/{id?}','update')->name('pointper.update');
});

//brand 
Route::controller(BrandController::class)->group(function(){
    Route::get('brand/index','index')->name('brand.index');
    Route::get('brand/create','create')->name('brand.create');
    Route::post('brand/store','store')->name('brand.store');
    Route::get('brand/edit/{id?}','edit')->name('brand.edit');
    Route::post('brand/update/{id?}','update')->name('brand.update');
    Route::get('brand/deactive/{id?}','deactive')->name('brand.deactive');
    Route::get('brand/deactiveindex','deactiveindex')->name('brand.deactiveindex');
    Route::get('brand/active/{id?}','active')->name('brand.active');
    Route::get('brand/delete/{id?}','destroy')->name('brand.delete');
});

Route::controller(UnitController::class)->group(function(){
    Route::get('unit/index','index')->name('unit.index');
    Route::get('unit/edit/{id?}','edit')->name('unit.edit');
    Route::post('unit/update/{id?}','update')->name('unit.update');
    Route::get('unit/delete/{id?}','destroy')->name('unit.delete');
    Route::post('unit/store','store')->name('unit.store');
});

