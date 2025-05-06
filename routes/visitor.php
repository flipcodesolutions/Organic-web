<?php

use App\Http\Controllers\PdfController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ViewAllController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::controller(VisitorController::class)->group(function(){

    // home page
    Route::get('/','index')->name('visitor.index');

    // user login / log out
    Route::get('visitor/loginindex','visitorlogin')->name('visitor.loginindex');
    Route::post('visitor/sendotp','sendotp')->name('visitor.sendotp');
    Route::post('visitor/verifyotp','verifyotp')->name('visitor.verifyotp');
    Route::get('visitor/logout','visitorlogout')->name('visitor.logout');

    // user login with google
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('visitor/login', 'handleGoogleCallback');

    Route::get('visitor/userregistrationindex','userregistrationindex')->name('visitor.userregistrationindex');
    Route::post('visitor/userregistration','userregistration')->name('visitor.userregistration');

    // user profile
    Route::get('visitor/profile','profile')->name('visitor.profile');
    Route::post('visitor/updateprofile/{id?}','updateprofile')->name('visitor.updateprofile');

    // user address
    Route::get('visitor/address','addressindex')->name('visitor.addressindex');
    Route::get('visitor/addaddress/{id?}','addaddress')->name('visitor.addaddress');
    Route::post('visitor/saveaddress/{id?}','storeaddress')->name('visitor.saveaddress');
    Route::get('visitor/editaddress/{id?}','editaddress')->name('visitor.editaddress');
    Route::post('visitor/updateaddress/{id?}','updateaddress')->name('visitor.updateaddress');
    Route::get('visitor/deleteaddress/{id?}','deleteaddress')->name('visitor.deleteaddress');

    // category page
    Route::get('category/{id?}','category')->name('home.category');

    // product page
    Route::get('product/{id?}','product')->name('home.product');
    Route::post('addtocart','addtocart')->name('home.addtocart');

    // cart page
    Route::get('cart', 'cartindex')->name('home.cart');
    Route::get('deletecart/{id?}', 'deletecart')->name('home.deletecart');
    Route::post('order','placeorder')->name('home.order');

    // order page
    Route::get('orderindex','orderindex')->name('home.orderindex');
    Route::get('orderdetail/{id?}','orderdetail')->name('home.orderdetail');

    // order detail page
    Route::post('productreview','productreview')->name('home.productreview');

});

// for download invoice pdf
Route::get('invoicepdf/{id?}',[PdfController::class,'invoicePDF'])->name('home.invoice');
Route::get('visitor/view-all', [ViewAllController::class, 'viewall'])->name('view.all');
Route::get('/search', [SearchController::class, 'serach'])->name('search');
?>
