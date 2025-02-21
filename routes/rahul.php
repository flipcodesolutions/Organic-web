<?php

use App\Http\Controllers\admin\Cms_MasterController;
use App\Http\Controllers\admin\DeliverySlotController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\ModuleController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\UnitMasterController;
use Illuminate\Support\Facades\Route;
// delivery slot route
Route::controller(DeliverySlotController::class)->group(function () {
    Route::get('deliveryslot/index', 'index')->name('deliveryslot.index');
    Route::get('deliveryslot/create', 'create')->name('deliveryslot.create');
    Route::post('deliveryslot/store', 'store')->name('deliveryslot.store');
    Route::get('deliveryslot/edit/{id}', 'edit')->name('deliveryslot.edit');
    Route::post('deliveryslot/update/{id}', 'update')->name('deliveryslot.update');
    Route::get('deliveryslot/delete/{id}', 'delete')->name('deliveryslot.delete');
    Route::get('deliveryslot/active/{id}', 'active')->name('deliveryslot.active');
    Route::get('deliveryslot/deactive', 'deactive')->name('deliveryslot.deactive');
    Route::get('deliveryslot/permdelete/{id}','permdelete')->name('deliveryslot.permdelete');
});

//cms_master route
Route::controller(Cms_MasterController::class)->group(function () {
    Route::get('cms_master/index', 'index')->name('cms_master.index');
    Route::get('cms_master/create', 'create')->name('cms_master.create');
    Route::post('cms_master/store', 'store')->name('cms_master.store');
    Route::get('cms_master/edit/{id}', 'edit')->name('cms_master.edit');
    Route::post('cms_master/update/{id}', 'update')->name('cms_master.update');
    Route::get('cms_master/delete/{id}', 'delete')->name('cms_master.delete');
    Route::get('cms_master/active/{id}', 'active')->name('cms_master.active');
    Route::get('cms_master/deactive', 'deactive')->name('cms_master.deactive');
    Route::get('cms_master/permdelete/{id}','permdelete')->name('cms_master.permdelete');
});

//faq route
Route::controller(FaqController::class)->group(function () {
    Route::get('faq/index', 'index')->name('faq.index');
    Route::get('faq/create', 'create')->name('faq.create');
    Route::post('faq/store', 'store')->name('faq.store');
    Route::get('faq/edit/{id}', 'edit')->name('faq.edit');
    Route::post('faq/update/{id}', 'update')->name('faq.update');
    Route::get('faq/delete/{id}', 'delete')->name('faq.delete');
    Route::get('faq/active/{id}', 'active')->name('faq.active');
    Route::get('faq/deactive', 'deactive')->name('faq.deactive');
    Route::get('faq/permdelete/{id}','permdelete')->name('faq.permdelete');
});

//slider route
// Route::controller(SliderController::class)->group(function(){
//     // Route::get('slider/index', 'index')->name('slider.index');
//     Route::get('slider/create', 'create')->name('slider.create');
//     // Route::post('slider/store', 'store')->name('slider.store');
//     // Route::get('slider/edit/{id}', 'edit')->name('slider.edit');
//     // Route::post('slider/update/{id}', 'update')->name('slider.update');
//     // Route::get('slider/delete/{id}', 'delete')->name('slider.delete');
//     // Route::get('slider/active/{id}', 'active')->name('slider.active');
//     // Route::get('slider/deactive', 'deactive')->name('slider.deactive');
//     // Route::get('slider/permdelete/{id}','permdelete')->name('slider.permdelete');
// });

// unitmaster route
Route::controller(UnitMasterController::class)->group(function(){
    Route::get('unitmaster/index', 'index')->name('unitmaster.index');
    Route::get('unitmaster/create', 'create')->name('unitmaster.create');
    Route::post('unitmaster/store', 'store')->name('unitmaster.store');
    Route::get('unitmaster/edit/{id}', 'edit')->name('unitmaster.edit');
    Route::post('unitmaster/update/{id}', 'update')->name('unitmaster.update');
    Route::get('unitmaster/delete/{id}', 'delete')->name('unitmaster.delete');
    Route::get('unitmaster/active/{id}', 'active')->name('unitmaster.active');
    Route::get('unitmaster/deactive', 'deactive')->name('unitmaster.deactive');
    Route::get('unitmaster/permdelete/{id}','permdelete')->name('unitmaster.permdelete');
});

// module route
Route::controller(ModuleController::class)->group(function () {
    Route::get('module/index', 'index')->name('module.index');
});
