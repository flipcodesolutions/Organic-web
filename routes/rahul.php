<?php

use App\Http\Controllers\admin\Cms_MasterController;
use App\Http\Controllers\admin\DeliverySlotController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\ModuleController;
use Illuminate\Support\Facades\Route;
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

// module route
Route::controller(ModuleController::class)->group(function () {
    Route::get('module/index', 'index')->name('module.index');
});
