<?php

use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Route;

Route::controller(VisitorController::class)->group(function(){
    Route::get('/','index')->name('visitor.index'); 
    Route::get('visitor/loginindex','visitorlogin')->name('visitor.loginindex');
    Route::post('visitor/login','visitorauthenticate')->name('visitor.login');
    Route::get('visitor/logout','visitorlogout')->name('visitor.logout');
    Route::get('category/{id?}','category')->name('home.category');
    Route::get('product/{id?}','product')->name('home.product');
    Route::post('addtocart','addtocart')->name('home.addtocart');
    Route::get('cart', 'cartindex')->name('home.cart');
    Route::get('deletecart/{id?}', 'deletecart')->name('home.deletecart');
});

?>