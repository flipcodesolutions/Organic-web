<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use Illuminate\Support\Facades\Route;


    // category route
    Route::controller(CategoryController::class)->group(function () {
        Route::get('category/index', 'index')->name('category.index');
        Route::get('category/create', 'create')->name('category.create');
        Route::post('category/store', 'store')->name('category.store');
        Route::get('category/edit/{id?}', 'edit')->name('category.edit');
        Route::post('category/update/{id?}', 'update')->name('category.update');
    });

    // product route
    Route::controller(ProductController::class)->group(function () {
        Route::get('product/index', 'index')->name('product.index');
        Route::get('product/create', 'create')->name('product.create');
        Route::post('product/store', 'store')->name('product.store');
        Route::get('product/edit/{id?}', 'edit')->name('product.edit');
        Route::post('product/update/{id?}', 'update')->name('product.update');
    });



?>