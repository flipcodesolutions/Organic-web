<?php
use App\Http\Controllers\vendor\PurchaseController;
// use App\Http\Controllers\vendor\VendorReviewController;
use App\Http\Controllers\Admin\Crm_MasterController;
use App\Http\Controllers\ViewAllController;
use Illuminate\Support\Facades\Route;

// Route::controller(Crm_MasterController::class)->group(function(){
//     Route::get('crm-master/index', 'index')->name('crm-masters.index');
//     Route::get('crm-master/create', 'create')->name('crm-masters.create');
//     Route::post('crm-master/store', 'store')->name('crm-masters.store');
//     Route::get('crm-master/edit/{id}', 'edit')->name('crm-masters.edit');
//     Route::put('crm-master/update/{id}', 'update')->name('crm-masters.update');
//     Route::get('crm-master/show/{id}', 'show')->name('crm-masters.show');
//     Route::delete('crm-master/delete/{crmMaster}', 'destroy')->name('crm-masters.destroy');

// });
// Route::get('visitor/view-all', [ViewAllController::class, 'viewall'])->name('view.all');
Route::get('/purchases', [PurchaseController::class, 'index'])->name('purchase.index');
Route::get('/purchases/create', [PurchaseController::class, 'create'])->name('purchase.create');
Route::post('/purchases', [PurchaseController::class, 'store'])->name('purchase.store');
Route::get('/purchases/{purchase}', [PurchaseController::class, 'show'])->name('purchase.show');
Route::get('/purchases/{purchase}/edit', [PurchaseController::class, 'edit'])->name('purchase.edit');
Route::post('/purchases/{purchase}', [PurchaseController::class, 'update'])->name('purchase.update');
Route::delete('/purchases/{purchase}', [PurchaseController::class, 'destroy'])->name('purchase.destroy');

// Route::post('/reviews', [VendorReviewController::class, 'store'])->name('reviews.store');
// Route::get('/product/{id}', [VendorReviewController::class, 'show'])->name('product.show');


