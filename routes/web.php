<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    require __DIR__ . '/joy.php';
    require __DIR__ . '/gunjan.php';
    require __DIR__ . '/rahul.php';
    require __DIR__ . '/bhavana.php';
    require __DIR__ . '/hardik.php';

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);


});
