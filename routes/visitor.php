<?php

use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Route;

Route::controller(VisitorController::class)->group(function(){
    Route::get('/','index')->name('visitor.index'); 
    Route::get('category/{id?}','category')->name('home.category');
    Route::get('product/{id?}','product')->name('home.product');
    Route::post('addtocart','addtocart')->name('home.addtocart');
    Route::get('cart', 'cartindex')->name('home.cart');
});

?>